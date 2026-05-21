<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use App\Http\Requests\StoreResponsibleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResponsibleController extends Controller
{
    public function index()
    {
        $responsibles = Responsible::withCount('clients')->latest()->paginate(10);
        return view('responsibles.index', compact('responsibles'));
    }

    public function create()
    {
        return view('responsibles.create');
    }

    public function store(StoreResponsibleRequest $request)
    {
        Responsible::create($request->validated());
        return redirect()->route('responsibles.index')->with('success', 'Responsable creado correctamente.');
    }

    public function upload()
    {
        return view('responsibles.upload');
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=plantilla_responsables.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = [
            'Nombre completo', 
            'Cédula', 
            'Correo Electrónico', 
            'Teléfono', 
            'Especialidad', 
            'Rol', 
            'Ubicación',
            'Hoja de Vida / Resumen',
            'Permisos', 
            'Estado'
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
                if (count($row) < 10) {
                    $errorCount++;
                    continue;
                }

                $name = trim($row[0]);
                $document = trim($row[1]);
                $email = trim($row[2]);

                if (empty($name) || empty($document) || empty($email)) {
                    $errorCount++;
                    continue;
                }

                // Normalización de Permisos
                $rawPermissions = trim($row[8]);
                $permissions = [];
                if (!empty($rawPermissions)) {
                    $permArray = explode(',', $rawPermissions);
                    foreach ($permArray as $perm) {
                        $p = strtolower(trim($perm));
                        $permMap = [
                            'casos' => 'cases',
                            'cases' => 'cases',
                            'aprobaciones' => 'approvals',
                            'approvals' => 'approvals',
                            'reportes' => 'reports',
                            'reports' => 'reports',
                        ];
                        if (isset($permMap[$p])) {
                            $permissions[] = $permMap[$p];
                        }
                    }
                }
                $permissions = array_unique($permissions);

                // Normalización de Estado
                $rawStatus = strtolower(trim($row[9]));
                $statusMap = [
                    'activo' => 'active',
                    'active' => 'active',
                    'ausente' => 'away',
                    'away' => 'away',
                ];
                $status = $statusMap[$rawStatus] ?? 'active';

                Responsible::updateOrCreate(
                    ['document' => $document],
                    [
                        'name' => $name,
                        'email' => $email,
                        'phone' => trim($row[3]) ?: null,
                        'specialty' => trim($row[4]) ?: 'General',
                        'role' => trim($row[5]) ?: 'Abogado',
                        'location' => trim($row[6]) ?: 'Bogotá',
                        'resume' => trim($row[7]) ?: null,
                        'permissions' => !empty($permissions) ? $permissions : null,
                        'status' => $status,
                    ]
                );

                $successCount++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error importing responsibles: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al importar el archivo. Revise el formato.');
        }

        fclose($handle);

        $msg = "Importación completada. $successCount responsables importados correctamente.";
        if ($errorCount > 0) {
            $msg .= " $errorCount filas ignoradas por errores o campos obligatorios faltantes.";
        }

        return redirect()->route('responsibles.index')->with('success', $msg);
    }
}
