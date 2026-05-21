<x-app-layout>
    <div class="max-w-7xl mx-auto py-4">
        <!-- Encabezado y Acción Principal -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Responsables</h1>
                <p class="text-[15px] text-gray-600 mt-1">Administra tu equipo legal, monitorea cargas de trabajo y asigna casos activos.</p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="{{ route('responsibles.upload') }}" class="w-full sm:w-auto bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm flex items-center justify-center gap-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Cargar Base de Datos
                </a>
                <a href="{{ route('responsibles.create') }}" class="w-full sm:w-auto bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-lg text-sm shadow-sm flex items-center justify-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    Añadir Responsable
                </a>
            </div>
        </div>

        <!-- Tarjetas de Resumen (Métricas Fijas Simuladas por ahora) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase mb-2">Total Profesionales</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-[#0f172a]">{{ $responsibles->total() }}</span>
                    <span class="text-xs font-semibold text-emerald-600 mb-1">+2 este mes</span>
                </div>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase mb-2">Abogados Activos</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-[#0f172a]">{{ $responsibles->where('status', 'active')->count() }}</span>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded ml-1 mb-1.5">75% CAPACIDAD</span>
                </div>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase mb-2">Promedio de Casos</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-[#0f172a]">12.4</span>
                    <span class="text-xs font-medium text-gray-500 mb-1">Casos / Profesional</span>
                </div>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase mb-2">Revisiones Pendientes</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-red-600">7</span>
                    <span class="text-[10px] font-bold text-red-700 bg-red-100 px-2 py-0.5 rounded ml-1 mb-1.5">URGENTE</span>
                </div>
            </div>
        </div>

        <!-- Tabla de Responsables -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="py-3 px-6 text-xs font-bold text-gray-600 uppercase tracking-wider">Nombre del Profesional</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-600 uppercase tracking-wider">Rol</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-600 uppercase tracking-wider">Casos Asignados</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-600 uppercase tracking-wider">Estado</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-600 uppercase tracking-wider text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($responsibles as $responsible)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded bg-[#e0e7ff] text-[#3730a3] flex items-center justify-center font-bold text-sm">
                                            {{ strtoupper(substr($responsible->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">{{ $responsible->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $responsible->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-sm font-medium text-gray-800">{{ $responsible->role }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-bold {{ $responsible->clients_count > 20 ? 'text-red-600' : 'text-[#0f172a]' }}">{{ $responsible->clients_count }}</span>
                                        <div class="w-24 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                            @php 
                                                $percentage = min(100, ($responsible->clients_count / 30) * 100);
                                                $color = $responsible->clients_count > 20 ? 'bg-red-600' : 'bg-[#1e58c8]';
                                            @endphp
                                            <div class="h-full {{ $color }}" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @if($responsible->status == 'active')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 tracking-wide uppercase">
                                            Activo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-800 tracking-wide uppercase">
                                            Ausente
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button class="px-3 py-1.5 text-xs font-semibold text-gray-600 border border-gray-300 rounded hover:bg-gray-50 transition-colors">
                                            Ver Carga de Trabajo
                                        </button>
                                        <button class="p-1.5 text-gray-400 hover:text-gray-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">
                                    No hay responsables registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($responsibles->hasPages())
            <div class="bg-white border-t border-gray-200 px-6 py-3 flex items-center justify-between">
                <p class="text-xs text-gray-500">
                    Mostrando <span class="font-bold">{{ $responsibles->firstItem() }}</span>-<span class="font-bold">{{ $responsibles->lastItem() }}</span> de <span class="font-bold">{{ $responsibles->total() }}</span> profesionales legales
                </p>
                <div>
                    {{ $responsibles->links('pagination::tailwind') }}
                </div>
            </div>
            @endif
        </div>

        <!-- Lower Section (Expertise & Spotlight) - Fija para maqueta -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="col-span-2 bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col">
                <h3 class="text-sm font-bold text-gray-800 mb-6">Distribución de Especialidades</h3>
                <div class="flex-grow flex items-end justify-between px-8 pb-4">
                    <!-- Bar Chart Mockup -->
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-32 bg-gray-100 rounded-t-sm relative"><div class="absolute bottom-0 w-full h-1/2 bg-blue-100 rounded-t-sm"></div></div>
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Derecho Civil</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-32 bg-gray-100 rounded-t-sm relative"><div class="absolute bottom-0 w-full h-3/4 bg-blue-100 rounded-t-sm"></div></div>
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Comercial</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-32 bg-gray-100 rounded-t-sm relative"><div class="absolute bottom-0 w-full h-1/4 bg-blue-100 rounded-t-sm"></div></div>
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Administrativo</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-32 bg-gray-100 rounded-t-sm relative"><div class="absolute bottom-0 w-full h-full bg-blue-100 rounded-t-sm"></div></div>
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Derecho Laboral</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-32 bg-gray-100 rounded-t-sm relative"><div class="absolute bottom-0 w-full h-1/3 bg-blue-100 rounded-t-sm"></div></div>
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Penal</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-[#0f172a] rounded-xl p-6 shadow-sm text-white flex flex-col justify-between relative overflow-hidden">
                <div class="absolute -right-10 -top-10 opacity-10">
                    <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z"/></svg>
                </div>
                
                <div class="relative z-10">
                    <span class="inline-block px-2 py-1 bg-[#1e58c8] text-[10px] font-bold uppercase tracking-wider rounded mb-4">Destacado del Mes</span>
                    <h3 class="text-xl font-bold mb-2">Mejor Rendimiento</h3>
                    <p class="text-sm text-gray-300 leading-relaxed mb-6">Alejandra Mora ha resuelto exitosamente 12 Tutelas esta semana con un cumplimiento del 100%.</p>
                </div>
                
                <div class="relative z-10 border-t border-gray-700 pt-4 mt-auto flex items-center gap-3">
                    <div class="w-10 h-10 rounded bg-[#1e58c8] flex items-center justify-center font-bold text-sm">AM</div>
                    <div>
                        <p class="text-sm font-bold">Alejandra Mora</p>
                        <p class="text-xs text-gray-400">Abogada Senior</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
