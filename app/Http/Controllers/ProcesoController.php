<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use App\Models\Responsible;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProcesoController extends Controller
{
    public function create()
    {
        $responsibles = Responsible::where('status', 'active')->get();
        // Generar un código interno aleatorio
        $codigoInterno = 'JT-' . date('Y') . '-' . strtoupper(Str::random(4));
        
        return view('procesos.create', compact('responsibles', 'codigoInterno'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'entidad' => 'required|string|max:255',
            'numero_obligacion' => 'nullable|string|max:255',
            'tipo_tramite' => 'required|string|max:255',
            'fecha_apertura' => 'required|date',
            'monto_disputa' => 'nullable|numeric',
            'estado_inicial' => 'required|string',
            'responsible_id' => 'required|exists:responsibles,id',
            'prioridad' => 'required|in:ALTA,MEDIA,BAJA',
            'codigo_interno' => 'required|string|unique:procesos,codigo_interno',
            'sla_estimado' => 'nullable|string',
            'tipo_notificacion' => 'nullable|string',
        ]);

        Proceso::create($validated);

        return redirect()->route('dashboard')->with('success', 'Proceso registrado exitosamente.');
    }
}
