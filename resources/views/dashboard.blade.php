<x-app-layout>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Dashboard de Control</h1>
        <p class="text-[15px] text-gray-600 mt-1">Bienvenido, {{ explode(' ', Auth::user()->name)[0] ?? 'Usuario' }}. Aquí está el estado actual de sus trámites legales.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2.5 bg-blue-50 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800">
                    +12%
                </span>
            </div>
            <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase mb-1">Total de Clientes</p>
            <h3 class="text-3xl font-bold text-[#0f172a]">1,248</h3>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2.5 bg-blue-50 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800">
                    Activos
                </span>
            </div>
            <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase mb-1">Procesos Activos</p>
            <h3 class="text-3xl font-bold text-[#0f172a]">342</h3>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2.5 bg-red-50 rounded-lg text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-red-100 text-red-800">
                    Pendientes
                </span>
            </div>
            <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase mb-1">Quejas SIC Pendientes</p>
            <h3 class="text-3xl font-bold text-[#0f172a]">18</h3>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2.5 bg-blue-50 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-blue-100 text-blue-800">
                    Urgente
                </span>
            </div>
            <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase mb-1">Tutelas por Preparar</p>
            <h3 class="text-3xl font-bold text-[#0f172a]">07</h3>
        </div>
    </div>

    <!-- Main Grid Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Chart Section -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex flex-col">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-[#0f172a]">Gráfico de Éxito de Eliminaciones</h3>
                <div class="flex items-center gap-4 text-sm font-medium text-gray-600">
                    <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Logradas</div>
                    <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-red-600"></span> Denegadas</div>
                </div>
            </div>
            <!-- Mock Chart -->
            <div class="flex-1 relative flex items-end justify-between px-4 pb-2 border-b border-gray-100 h-64 mt-4">
                <!-- Grid Lines -->
                <div class="absolute inset-0 flex flex-col justify-between pt-2 pb-6">
                    <div class="border-b border-gray-100 w-full"></div>
                    <div class="border-b border-gray-100 w-full"></div>
                    <div class="border-b border-gray-100 w-full"></div>
                    <div class="border-b border-gray-100 w-full"></div>
                </div>
                <!-- Bars -->
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-emerald-500 rounded-t-sm" style="height: 180px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">Ene</span>
                </div>
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-emerald-500 rounded-t-sm opacity-90" style="height: 160px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">Feb</span>
                </div>
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-emerald-500 rounded-t-sm" style="height: 190px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">Mar</span>
                </div>
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-red-600 rounded-t-sm" style="height: 40px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">Abr</span>
                </div>
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-emerald-500 rounded-t-sm" style="height: 185px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">May</span>
                </div>
                <div class="relative flex flex-col items-center w-full max-w-[40px] z-10">
                    <div class="w-8 bg-emerald-500 rounded-t-sm" style="height: 190px;"></div>
                    <span class="text-xs text-gray-500 font-medium mt-4">Jun</span>
                </div>
            </div>
        </div>

        <!-- Alerts Section -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm flex flex-col h-full">
            <div class="p-5 border-b border-gray-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <h3 class="text-[17px] font-bold text-[#0f172a]">Alertas Críticas</h3>
            </div>
            <div class="p-5 space-y-4 flex-1">
                <!-- Alert 1 -->
                <div class="bg-gray-50 border-l-4 border-red-600 rounded-r-lg p-4 shadow-sm relative overflow-hidden">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-bold text-red-600 tracking-wide uppercase">Vence Mañana</span>
                        <span class="text-xs font-semibold text-gray-500">Exp. #4402</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium mb-3">Respuesta SIC para <span class="font-bold">Carlos Andrés Ruíz</span>.</p>
                    <button class="w-full bg-[#c22e2e] hover:bg-red-700 text-white font-semibold py-2 rounded-md text-xs transition-colors shadow-sm">
                        Gestionar Ahora
                    </button>
                </div>
                <!-- Alert 2 -->
                <div class="bg-gray-50 border-l-4 border-blue-600 rounded-r-lg p-4 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-bold text-[#0f172a] tracking-wide uppercase">Vence Hoy</span>
                        <span class="text-xs font-semibold text-gray-500">Exp. #4388</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium mb-3">Preparar Tutela para <span class="font-bold">María Fernanda Gómez</span>.</p>
                    <button class="w-full bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2 rounded-md text-xs transition-colors shadow-sm">
                        Abrir Editor
                    </button>
                </div>
                <!-- Alert 3 -->
                <div class="bg-gray-50 border-l-4 border-gray-400 rounded-r-lg p-4 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-bold text-gray-600 tracking-wide uppercase">Próximo</span>
                        <span class="text-xs font-semibold text-gray-500">Exp. #4410</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium mb-3">Subir pruebas para <span class="font-bold">Juan Sebastián Toro</span>.</p>
                    <button class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-[#0f172a] font-semibold py-2 rounded-md text-xs transition-colors shadow-sm">
                        Cargar Archivo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-[17px] font-bold text-[#0f172a]">Actividad Reciente</h3>
            <a href="#" class="text-[13px] font-semibold text-blue-600 hover:text-blue-800 flex items-center gap-1 transition-colors">
                Ver todo el historial 
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200">
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase w-1/4">Cliente / Expediente</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase w-1/5">Central de Riesgo</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase w-1/4">Tipo de Respuesta</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase w-[15%]">Estado</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Fecha</th>
                        <th class="px-4 py-4 w-10"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-[13px]">
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-[#0f172a] mb-0.5 text-sm">Ricardo Mendoza</p>
                            <p class="text-gray-500 text-xs">#4550 - Bancolombia S.A.</p>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">Datacrédito Experian</td>
                        <td class="px-6 py-4 text-gray-700">Eliminación por Caducidad</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-100 text-emerald-800 tracking-wide">APROBADO</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Hace 10 min</td>
                        <td class="px-4 py-4 text-center">
                            <button class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-[#0f172a] mb-0.5 text-sm">Elena Castañeda</p>
                            <p class="text-gray-500 text-xs">#4548 - Davivienda</p>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">TransUnion (CIFIN)</td>
                        <td class="px-6 py-4 text-gray-700">Habeas Data Art. 12</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-blue-100 text-blue-800 tracking-wide">PROCESANDO</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Hace 45 min</td>
                        <td class="px-4 py-4 text-center">
                            <button class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-[#0f172a] mb-0.5 text-sm">Sandro Villegas</p>
                            <p class="text-gray-500 text-xs">#4545 - Claro Hogar</p>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">Datacrédito Experian</td>
                        <td class="px-6 py-4 text-gray-700">Reclamación Suplantación</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-red-100 text-red-800 tracking-wide">RECHAZADO</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Hoy, 09:12 AM</td>
                        <td class="px-4 py-4 text-center">
                            <button class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-[#0f172a] mb-0.5 text-sm">Lucía Marín</p>
                            <p class="text-gray-500 text-xs">#4542 - Tarjeta Exito</p>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">Procrédito</td>
                        <td class="px-6 py-4 text-gray-700">Prescripción Judicial</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-100 text-emerald-800 tracking-wide">APROBADO</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Ayer, 04:30 PM</td>
                        <td class="px-4 py-4 text-center">
                            <button class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
