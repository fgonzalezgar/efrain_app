<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <!-- Breadcrumbs y Título -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-[#0f172a]">Registrar Nuevo Proceso</h1>
                <p class="mt-1 text-[15px] text-gray-500">Diligencie los campos técnicos para la apertura del expediente jurídico.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    Cancelar
                </a>
                <button type="submit" form="proceso-form" class="px-4 py-2 bg-[#1e58c8] hover:bg-blue-700 text-white rounded-lg text-sm font-semibold shadow-sm transition-colors">
                    Guardar Proceso
                </button>
            </div>
        </div>

        <form id="proceso-form" action="{{ route('procesos.store') }}" method="POST" class="flex flex-col lg:flex-row gap-6">
            @csrf
            
            <!-- Columna Izquierda (Formularios Principales) -->
            <div class="flex-1 space-y-6">
                <!-- Tarjeta: Datos de la Entidad -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h2 class="text-base font-semibold text-[#0f172a]">Datos de la Entidad</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1 md:col-span-2">
                                <label for="client_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Cliente <span class="text-red-500">*</span></label>
                                <select name="client_id" id="client_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" required>
                                    <option value="">Seleccione un cliente...</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->document }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="entidad" class="block text-sm font-semibold text-gray-700 mb-1.5">Entidad Financiera / Comercial</label>
                                <input type="text" id="entidad" name="entidad" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="Ej: Bancolombia, Falabella..." required>
                            </div>
                            <div>
                                <label for="numero_obligacion" class="block text-sm font-semibold text-gray-700 mb-1.5">Número de Obligación o Producto</label>
                                <input type="text" id="numero_obligacion" name="numero_obligacion" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="000-XXXXXXXXX-X">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta: Información del Proceso -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h2 class="text-base font-semibold text-[#0f172a]">Información del Proceso</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Tipo de Trámite Jurídico</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="tipo_tramite" value="Petición Inicial" class="peer sr-only" checked>
                                    <div class="px-4 py-3 border border-gray-200 rounded-lg text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:text-blue-700 font-medium text-sm transition-all text-gray-600 hover:bg-gray-50">
                                        Petición Inicial
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="tipo_tramite" value="Queja ante SIC" class="peer sr-only">
                                    <div class="px-4 py-3 border border-gray-200 rounded-lg text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:text-blue-700 font-medium text-sm transition-all text-gray-600 hover:bg-gray-50">
                                        Queja ante SIC
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="tipo_tramite" value="Acción de Tutela" class="peer sr-only">
                                    <div class="px-4 py-3 border border-gray-200 rounded-lg text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:text-blue-700 font-medium text-sm transition-all text-gray-600 hover:bg-gray-50">
                                        Acción de Tutela
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="fecha_apertura" class="block text-sm font-semibold text-gray-700 mb-1.5">Fecha de Apertura</label>
                                <input type="date" id="fecha_apertura" name="fecha_apertura" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" required>
                            </div>
                            <div>
                                <label for="monto_disputa" class="block text-sm font-semibold text-gray-700 mb-1.5">Monto en Disputa (COP)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 text-sm font-medium">
                                        $
                                    </div>
                                    <input type="text" id="monto_disputa" name="monto_disputa" class="w-full pl-8 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta: Área de Documentación -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-gray-100 text-gray-600 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            </div>
                            <h2 class="text-base font-semibold text-[#0f172a]">Área de Documentación</h2>
                        </div>
                        <span class="text-xs text-gray-500 font-medium">Máximo 20MB por archivo</span>
                    </div>
                    <div class="p-6">
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 flex flex-col items-center justify-center text-center">
                            <svg class="w-10 h-10 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="text-sm font-semibold text-[#0f172a] mb-1">Arrastre o seleccione documentos probatorios</p>
                            <p class="text-[13px] text-gray-500 mb-4">Reportes de crédito, contratos, extractos bancarios (PDF, JPG, PNG)</p>
                            <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                Examinar archivos
                            </button>
                        </div>

                        <!-- Ejemplo de archivo subido (estático por ahora) -->
                        <div class="mt-4 flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50">
                            <div class="flex items-center gap-3">
                                <div class="bg-white p-2 border border-gray-200 rounded shadow-sm">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-[#0f172a]">Reporte_Datacredito_Oct2023.pdf</p>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">1.2 MB • Listo para cargar</p>
                                </div>
                            </div>
                            <button type="button" class="text-red-500 hover:text-red-700 p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha (Sidebars) -->
            <div class="w-full lg:w-[320px] space-y-6">
                <!-- Sidebar 1: Configuración Legal -->
                <div class="bg-[#0f172a] rounded-xl shadow-sm overflow-hidden text-white">
                    <div class="px-6 py-5 border-b border-white/10 flex items-center gap-3">
                        <div class="p-1.5 bg-white/10 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h2 class="text-base font-semibold">Configuración Legal</h2>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        <div>
                            <label for="estado_inicial" class="block text-[13px] font-semibold text-gray-300 mb-1.5">Estado Inicial del Caso</label>
                            <select name="estado_inicial" id="estado_inicial" class="w-full bg-[#1e293b] border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 text-white transition-colors">
                                <option value="En Estudio">En Estudio</option>
                                <option value="Radicado">Radicado</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[13px] font-semibold text-gray-300 mb-2">Responsable Asignado</label>
                            <div class="space-y-3">
                                @forelse($responsibles as $index => $resp)
                                    <label class="cursor-pointer block">
                                        <input type="radio" name="responsible_id" value="{{ $resp->id }}" class="peer sr-only" {{ $index === 0 ? 'checked' : '' }}>
                                        <div class="flex items-center gap-3 p-3 border border-white/10 rounded-lg bg-[#1e293b] peer-checked:border-blue-500 peer-checked:bg-[#1e293b]/50 transition-colors">
                                            <!-- Fake Radio dot -->
                                            <div class="w-4 h-4 rounded-full border border-gray-400 peer-checked:border-blue-500 peer-checked:border-[4px] bg-transparent flex-shrink-0 transition-all"></div>
                                            <!-- Avatar -->
                                            <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-600 shrink-0">
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($resp->name) }}&background=475569&color=fff" alt="{{ $resp->name }}" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Info -->
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold text-white truncate">{{ $resp->name }}</p>
                                                <p class="text-[11px] text-gray-400 truncate">{{ $resp->specialty }}</p>
                                            </div>
                                        </div>
                                    </label>
                                @empty
                                    <p class="text-sm text-gray-400 italic">No hay responsables activos.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="pt-4 border-t border-white/10">
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-[13px] font-semibold text-gray-300">Prioridad Sugerida</label>
                                <span class="bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded">ALTA</span>
                            </div>
                            <p class="text-[12px] text-gray-400 italic">Procesos de reclamación bancaria suelen requerir respuesta en menos de 15 días hábiles.</p>
                            <!-- Input hidden to submit priority -->
                            <input type="hidden" name="prioridad" value="ALTA">
                        </div>
                    </div>
                </div>

                <!-- Sidebar 2: Resumen -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Resumen del Expediente</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Código Interno:</span>
                            <span class="font-bold text-[#0f172a]">{{ $codigoInterno }}</span>
                            <input type="hidden" name="codigo_interno" value="{{ $codigoInterno }}">
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">SLA Estimado:</span>
                            <span class="font-bold text-blue-600">15 Días Hábiles</span>
                            <input type="hidden" name="sla_estimado" value="15 Días Hábiles">
                        </div>
                        <div class="flex justify-between items-start text-sm">
                            <span class="text-gray-500">Tipo Notificación:</span>
                            <span class="font-bold text-[#0f172a] text-right">Electrónica /<br>Email</span>
                            <input type="hidden" name="tipo_notificacion" value="Electrónica / Email">
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 rounded-xl border border-blue-100 p-4 flex gap-3 items-start">
                    <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-[13px] text-blue-800 italic leading-relaxed">
                        Al guardar, se notificará automáticamente al responsable asignado para iniciar la revisión preliminar.
                    </p>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
