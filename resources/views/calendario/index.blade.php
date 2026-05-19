<x-app-layout>
    <div class="max-w-7xl mx-auto py-4">
        
        <div class="flex flex-col lg:flex-row gap-6">
            
            <!-- Calendario Principal (Izquierda) -->
            <div class="flex-1">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col h-full">
                    
                    <!-- Header del Calendario -->
                    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <h2 class="text-lg font-bold text-[#0f172a]">Octubre 2023</h2>
                            <div class="flex items-center rounded-lg border border-gray-300 overflow-hidden shadow-sm">
                                <button class="px-2 py-1.5 bg-white hover:bg-gray-50 border-r border-gray-300 text-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                </button>
                                <button class="px-2 py-1.5 bg-white hover:bg-gray-50 text-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                            </div>
                            <button class="px-4 py-1.5 bg-white border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 shadow-sm transition-colors">
                                Hoy
                            </button>
                        </div>
                        
                        <div class="flex items-center bg-gray-100 rounded-lg p-1">
                            <button class="px-4 py-1.5 bg-white shadow rounded text-sm font-bold text-[#0f172a]">Mes</button>
                            <button class="px-4 py-1.5 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Semana</button>
                            <button class="px-4 py-1.5 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Día</button>
                        </div>
                    </div>

                    <!-- Días de la Semana -->
                    <div class="grid grid-cols-7 border-b border-gray-200 bg-gray-50">
                        @foreach(['LUN', 'MAR', 'MIÉ', 'JUE', 'VIE', 'SÁB', 'DOM'] as $day)
                            <div class="py-2 text-center text-xs font-bold text-gray-600 uppercase tracking-wider {{ !$loop->last ? 'border-r border-gray-200' : '' }}">
                                {{ $day }}
                            </div>
                        @endforeach
                    </div>

                    <!-- Cuadrícula del Calendario -->
                    <div class="flex-1 grid grid-cols-7 grid-rows-5 bg-gray-200 gap-px">
                        <!-- Fila 1 (25-1) -->
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">25</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">26</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">27</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">28</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">29</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-400 text-sm font-medium">30</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">1</div>
                        
                        <!-- Fila 2 (2-8) -->
                        <div class="bg-white min-h-[120px] p-2 flex flex-col gap-1">
                            <span class="text-gray-900 text-sm font-bold mb-1">2</span>
                            <div class="bg-[#1e293b] text-white text-[10px] font-bold px-1.5 py-1 rounded truncate shadow-sm">
                                Radicación Bancolombia
                            </div>
                        </div>
                        <div class="bg-blue-50/50 min-h-[120px] p-2 flex flex-col gap-1 border-2 border-blue-400 relative z-10 shadow-sm">
                            <span class="text-blue-600 text-sm font-bold mb-1">3</span>
                            <div class="bg-red-100 text-red-700 border border-red-200 text-[10px] font-bold px-1.5 py-1 rounded truncate">
                                Tutela Falabella
                            </div>
                            <div class="bg-emerald-100 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-1.5 py-1 rounded truncate">
                                Vencimiento Cobro
                            </div>
                        </div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">4</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">5</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">6</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">7</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">8</div>
                        
                        <!-- Fila 3 (9-15) -->
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">9</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">10</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">11</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">12</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">13</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">14</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">15</div>

                        <!-- Fila 4 (16-22) -->
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">16</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">17</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">18</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">19</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">20</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">21</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">22</div>

                        <!-- Fila 5 (23-29) -->
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">23</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">24</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">25</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">26</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">27</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">28</div>
                        <div class="bg-white min-h-[120px] p-2 text-gray-900 text-sm font-bold">29</div>
                    </div>
                </div>
            </div>

            <!-- Panel Lateral (Derecha) -->
            <div class="w-full lg:w-[320px] space-y-6">
                
                <!-- Tareas Pendientes -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-bold text-[#0f172a]">Tareas Pendientes</h3>
                            <p class="text-sm text-gray-500 mt-0.5">Martes, 3 de Octubre</p>
                        </div>
                        <div class="w-8 h-8 bg-blue-50 text-blue-600 rounded flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Tarea 1 -->
                        <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:border-gray-300 transition-colors">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wide">ALTA PRIORIDAD</span>
                                <span class="text-[11px] font-semibold text-gray-500">Exp: 2023-00452</span>
                            </div>
                            <h4 class="text-sm font-bold text-[#0f172a] mb-1">Preparar Tutela</h4>
                            <p class="text-[13px] text-gray-600 mb-4">Falabella S.A.</p>
                            <div class="flex items-center gap-2">
                                <button class="flex-1 bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-[13px] shadow-sm transition-colors">
                                    Radicar
                                </button>
                                <button class="px-2 py-2 border border-gray-300 text-gray-600 hover:bg-gray-50 rounded transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Tarea 2 -->
                        <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:border-gray-300 transition-colors">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-[#1e293b] text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wide">EN PROGRESO</span>
                                <span class="text-[11px] font-semibold text-gray-500">Exp: 2023-00891</span>
                            </div>
                            <h4 class="text-sm font-bold text-[#0f172a] mb-1">Petición Inicial</h4>
                            <p class="text-[13px] text-gray-600 mb-4">Banco de Bogotá</p>
                            <button class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded text-[13px] transition-colors">
                                Ver Detalles
                            </button>
                        </div>

                        <!-- Tarea 3 / Evento -->
                        <div class="border-l-4 border-emerald-500 bg-gray-50 rounded-r-lg p-4">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div>
                                    <h4 class="text-sm font-bold text-[#0f172a]">Revisión de Archivos</h4>
                                    <p class="text-[13px] text-emerald-600 font-medium mt-0.5">04:45 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumen Semanal -->
                <div class="bg-[#0f172a] rounded-xl p-6 shadow-sm text-white">
                    <h3 class="text-[15px] font-bold mb-4">Resumen Semanal</h3>
                    <div class="flex items-end justify-between">
                        <div>
                            <span class="text-4xl font-bold block mb-1">12</span>
                            <span class="text-[11px] font-bold tracking-wider text-gray-400 uppercase">CASOS ACTIVOS</span>
                        </div>
                        <button class="bg-white text-[#0f172a] font-bold py-2 px-4 rounded text-sm hover:bg-gray-100 transition-colors shadow-sm">
                            Ver Reporte
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
