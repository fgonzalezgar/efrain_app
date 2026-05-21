<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Department;
use App\Models\Municipality;
use App\Models\Responsible;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clientes.index', compact('clients'));
    }

    public function upload()
    {
        return view('clientes.upload');
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        $responsibles = Responsible::where('status', 'active')->orderBy('name')->get();
        return view('clientes.create', compact('departments', 'responsibles'));
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clientes.show', compact('client'));
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=plantilla_clientes.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = [
            'Nombre completo', 
            'Cédula', 
            'Correo Electrónico', 
            'Teléfono', 
            'Departamento', 
            'Municipio', 
            'Dirección',
            'Estado Inicial', 
            'Central de Riesgo',
            'Notas'
        ];

        $callback = function() use($columns) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF"); // BOM for UTF-8 Excel support
            fputcsv($file, $columns, ',');
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('file');
        
        $handle = fopen($file->getRealPath(), 'r');
        
        $bom = "\xef\xbb\xbf";
        if (fgets($handle, 4) !== $bom) {
            rewind($handle);
        }

        $header = fgetcsv($handle, 1000, ',');
        if ($header && count($header) == 1) {
            rewind($handle);
            if (fgets($handle, 4) !== $bom) { rewind($handle); }
            $header = fgetcsv($handle, 1000, ';');
            $separator = ';';
        } else {
            $separator = ',';
        }

        $successCount = 0;
        $errorCount = 0;

        DB::beginTransaction();

        try {
            while (($row = fgetcsv($handle, 1000, $separator)) !== FALSE) {
                if(count($row) < 10) {
                    $errorCount++;
                    continue;
                }

                $departmentName = trim($row[4]);
                $municipalityName = trim($row[5]);

                $dept = Department::where('name', 'LIKE', $departmentName)->first();
                if (!$dept) {
                    $errorCount++;
                    continue;
                }

                $mun = Municipality::where('department_id', $dept->id)
                                    ->where('name', 'LIKE', $municipalityName)
                                    ->first();
                
                if (!$mun) {
                    $errorCount++;
                    continue;
                }

                // Normalización de Estado Inicial
                $rawStatus = strtolower(trim($row[7]));
                $statusMap = [
                    'petición' => 'peticion',
                    'peticion' => 'peticion',
                    'respuesta' => 'respuesta',
                    'esperando respuesta' => 'respuesta',
                    'tutela' => 'tutela',
                    'acción de tutela' => 'tutela',
                    'sic' => 'sic',
                    'queja sic' => 'sic',
                    'queja ante la sic' => 'sic',
                ];
                $initialStatus = $statusMap[$rawStatus] ?? 'peticion';

                // Normalización de Central de Riesgo
                $rawBureau = strtolower(trim($row[8]));
                $bureauMap = [
                    'datacrédito' => 'datacredito',
                    'datacredito' => 'datacredito',
                    'cifin' => 'cifin',
                    'transunion' => 'cifin',
                ];
                $bureau = $bureauMap[$rawBureau] ?? 'datacredito';

                Client::updateOrCreate(
                    ['document' => trim($row[1])],
                    [
                        'name' => trim($row[0]),
                        'email' => trim($row[2]) ?: null,
                        'phone' => trim($row[3]) ?: null,
                        'department_id' => $dept->id,
                        'municipality_id' => $mun->id,
                        'address' => trim($row[6]) ?: null,
                        'initial_status' => $initialStatus,
                        'bureau' => $bureau,
                        'notes' => trim($row[9]) ?: null,
                    ]
                );

                $successCount++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error importing clients: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al importar el archivo. Revise el formato.');
        }

        fclose($handle);

        $msg = "Importación completada. $successCount clientes importados correctamente.";
        if ($errorCount > 0) {
            $msg .= " $errorCount filas ignoradas por errores.";
        }

        return redirect()->route('clientes.index')->with('success', $msg);
    }
}
