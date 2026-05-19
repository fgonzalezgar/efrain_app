<x-app-layout>
    <div class="max-w-7xl mx-auto py-6">
        
        <!-- Header Info Card -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm mb-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-5">
                <div class="relative w-20 h-20 shrink-0">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($client->name) }}&background=1e293b&color=fff&size=80" class="rounded-xl object-cover border border-gray-200 shadow-sm" alt="{{ $client->name }}">
                    <div class="absolute -bottom-1.5 -right-1.5 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-[#0f172a] tracking-tight mb-2">{{ $client->name }}</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            CC {{ $client->document }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $client->email ?? 'No registrado' }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            {{ $client->phone ?? 'No registrado' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end gap-3 text-right">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 tracking-wide uppercase shadow-sm">
                    Proceso Activo
                </span>
                <span class="text-[11px] text-gray-500 font-medium">Última actualización: 14 Oct, 2023</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Columna Izquierda: Trazabilidad -->
            <div class="lg:col-span-2">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8 h-full">
                    <h2 class="text-lg font-bold text-[#0f172a] mb-8 flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        Trazabilidad del Proceso Legal
                    </h2>

                    <!-- Timeline -->
                    <div class="relative ml-4 md:ml-6 pb-4">
                        <!-- Linea conectora vertical -->
                        <div class="absolute top-2 bottom-4 left-[15px] w-0.5 bg-gray-200"></div>

                        <!-- Step 1: Petición (Verde) -->
                        <div class="relative pl-12 mb-10">
                            <!-- Icono -->
                            <div class="absolute left-0 top-0 w-8 h-8 rounded-full bg-emerald-500 border-[3px] border-white text-white flex items-center justify-center shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            
                            <!-- Contenido -->
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-bold text-gray-900">Petición Inicial a Entidad</h3>
                                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded">12 Sep, 2023</span>
                            </div>
                            
                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800 leading-tight">Radicado: #PET-2023-0912</p>
                                        <p class="text-[11px] text-gray-500">Entidad: Banco de Occidente</p>
                                    </div>
                                </div>
                                <button class="text-xs font-bold text-[#1e58c8] hover:underline flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Ver Documento
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Respuesta (Rojo) -->
                        <div class="relative pl-12 mb-10">
                            <!-- Icono -->
                            <div class="absolute left-0 top-0 w-8 h-8 rounded-full bg-red-600 border-[3px] border-white text-white flex items-center justify-center shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </div>
                            
                            <!-- Contenido -->
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-bold text-gray-900">Respuesta Recibida</h3>
                                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded">28 Sep, 2023</span>
                            </div>
                            
                            <div class="border border-red-100 rounded-lg p-5 bg-red-50/30">
                                <div class="flex items-center justify-between border-b border-red-100 pb-3 mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[11px] font-bold text-red-700 tracking-wider">ESTADO: NEGATIVA</span>
                                        <span class="text-[11px] text-gray-500">• 16 días transcurridos</span>
                                    </div>
                                    <button class="text-xs font-bold text-[#1e58c8] hover:underline flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Descargar Respuesta
                                    </button>
                                </div>
                                <p class="text-sm text-gray-700 italic">"La entidad alega que el reporte es legítimo debido a una mora superior a 90 días en el producto de tarjeta de crédito..."</p>
                            </div>
                        </div>

                        <!-- Step 3: SIC (Azul - En progreso) -->
                        <div class="relative pl-12 mb-10">
                            <!-- Icono -->
                            <div class="absolute left-0 top-0 w-8 h-8 rounded-full bg-[#1e58c8] border-[3px] border-white text-white flex items-center justify-center shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 5a2 2 0 100-4 2 2 0 000 4zm0 5a2 2 0 100-4 2 2 0 000 4zm0 9a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                            </div>
                            
                            <!-- Contenido -->
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-bold text-gray-900">Queja ante la SIC</h3>
                                <span class="bg-blue-100 text-[#1e58c8] text-xs font-bold px-3 py-1 rounded">Radicado el 02 Oct, 2023</span>
                            </div>
                            
                            <div class="border border-gray-200 rounded-lg p-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1">Vencimiento de Términos</p>
                                        <p class="text-xl font-bold text-red-600">18 Oct, 2023</p>
                                    </div>
                                    <span class="bg-orange-100 text-orange-800 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                                        En Evaluación
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Tutela (Gris - Inactivo) -->
                        <div class="relative pl-12">
                            <!-- Icono -->
                            <div class="absolute left-0 top-0 w-8 h-8 rounded-full bg-gray-200 border-[3px] border-white text-white flex items-center justify-center shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                            </div>
                            
                            <!-- Contenido -->
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-400">Acción de Tutela</h3>
                                <span class="text-gray-400 text-xs italic">Pendiente de resolución SIC</span>
                            </div>
                            
                            <p class="text-sm text-gray-400">Esta acción se habilitará si la respuesta de la SIC es desfavorable o si se vencen los términos legales sin pronunciamiento.</p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Acciones Contextuales -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Acciones Contextuales</h3>
                    
                    <button class="w-full mb-3 bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm flex justify-center items-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Preparar Tutela
                    </button>
                    
                    <button class="w-full mb-4 bg-white hover:bg-gray-50 text-[#1e58c8] font-semibold py-2.5 px-4 border border-[#1e58c8] rounded-lg text-sm shadow-sm flex justify-center items-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Ampliar Queja SIC
                    </button>
                    
                    <p class="text-[10px] text-gray-500 leading-tight">
                        <svg class="w-3 h-3 inline text-gray-400 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        La acción de tutela se recomienda tras el vencimiento de los 15 días hábiles de la SIC.
                    </p>
                </div>

                <!-- Documentos -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-bold text-gray-900">Documentos</h3>
                        <button class="text-[#1e58c8] hover:text-blue-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Doc 1 -->
                        <div class="flex items-start gap-3 border-b border-gray-100 pb-4">
                            <div class="w-10 h-10 rounded bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"/><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 1.054.23 1.28.631.094.166.12.338.12.503 0 .414-.047.81-.121 1.056zm4.1 0c-.282.355-.837.527-1.42.527a2.535 2.535 0 0 1-.295-.018v1.314h-1.04v-3.877A5.64 5.64 0 0 1 12.012 14c.734 0 1.355.23 1.633.686.113.184.148.403.148.651 0 .338-.053.64-.201.853zm3.433-1.255h-1.332v.941h1.065v.698h-1.065v1.438h-.888v-3.824h2.22v.747zM13 9V3.5L18.5 9H13z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5 hover:text-[#1e58c8] cursor-pointer">Peticion_Mendez.pdf</p>
                                <p class="text-xs text-gray-500">12 Sep 2023 • 2.4 MB</p>
                            </div>
                        </div>
                        
                        <!-- Doc 2 -->
                        <div class="flex items-start gap-3 border-b border-gray-100 pb-4">
                            <div class="w-10 h-10 rounded bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"/><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 1.054.23 1.28.631.094.166.12.338.12.503 0 .414-.047.81-.121 1.056zm4.1 0c-.282.355-.837.527-1.42.527a2.535 2.535 0 0 1-.295-.018v1.314h-1.04v-3.877A5.64 5.64 0 0 1 12.012 14c.734 0 1.355.23 1.633.686.113.184.148.403.148.651 0 .338-.053.64-.201.853zm3.433-1.255h-1.332v.941h1.065v.698h-1.065v1.438h-.888v-3.824h2.22v.747zM13 9V3.5L18.5 9H13z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5 hover:text-[#1e58c8] cursor-pointer">Respuesta_Banco.pdf</p>
                                <p class="text-xs text-gray-500">28 Sep 2023 • 1.8 MB</p>
                            </div>
                        </div>
                        
                        <!-- Doc 3 -->
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded bg-blue-50 text-blue-500 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM8 18h8v-2H8v2zm0-4h8v-2H8v2zm0-4h5V8H8v2zm5-3V3.5L18.5 9H13z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5 hover:text-[#1e58c8] cursor-pointer">Queja_SIC_Radicado.docx</p>
                                <p class="text-xs text-gray-500">02 Oct 2023 • 45 KB</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-5 py-2 text-sm font-bold text-[#1e58c8] border border-gray-200 hover:border-[#1e58c8] hover:bg-gray-50 rounded-lg transition-colors">
                        Ver todo el repositorio
                    </button>
                </div>
                
                <!-- Resumen Financiero -->
                <div class="bg-[#1e293b] border border-gray-700 rounded-xl shadow-sm p-6 text-white">
                    <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-6">Resumen Financiero</h3>
                    
                    <div class="space-y-4 mb-6 border-b border-gray-700 pb-5">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-300">Deuda Reportada:</span>
                            <span class="text-lg font-bold tracking-tight">$12.450.000</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-300">Tiempo en Mora:</span>
                            <span class="text-base font-bold text-gray-200">24 meses</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-xs font-bold text-emerald-400 tracking-wide">Viabilidad de eliminación: ALTA</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
