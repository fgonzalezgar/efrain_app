<x-app-layout>
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Gestión de Clientes</h1>
            <p class="text-[15px] text-gray-600 mt-1">Administra y realiza seguimiento a los procesos legales de eliminación de reportes.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-center gap-3">
            <a href="{{ route('clientes.upload') }}" class="w-full sm:w-auto bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm flex items-center justify-center gap-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Cargar Base de Datos
            </a>
            <a href="{{ route('clientes.create') }}" class="w-full sm:w-auto bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-5 rounded-lg text-sm shadow-sm flex items-center justify-center gap-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nuevo Cliente
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-col md:flex-row gap-4 mb-8">
        <!-- Estado del Proceso -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 flex-1">
            <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wide mb-2">Estado del Proceso</label>
            <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2">
                <option>Todos los estados</option>
                <option>Petición Inicial</option>
                <option>Tutela</option>
                <option>Queja SIC</option>
            </select>
        </div>
        <!-- Fecha de Vencimiento -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 flex-1">
            <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wide mb-2">Fecha de Vencimiento</label>
            <input type="date" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm text-gray-500 py-2">
        </div>
        <!-- Central de Riesgo -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 flex-1 min-w-[250px]">
            <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wide mb-2">Central de Riesgo</label>
            <div class="flex rounded-md shadow-sm">
                <button class="flex-1 bg-blue-50 border border-blue-200 text-blue-700 rounded-l-md px-4 py-2 text-sm font-semibold transition-colors">Datacrédito</button>
                <button class="flex-1 bg-white border border-gray-300 border-l-0 text-gray-600 hover:bg-gray-50 rounded-r-md px-4 py-2 text-sm font-medium transition-colors">Cifin</button>
            </div>
        </div>
        <!-- Limpiar Filtros -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-end justify-center w-full md:w-auto md:min-w-[180px]">
            <button class="w-full h-[38px] bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold px-4 rounded-md text-sm shadow-sm flex items-center justify-center gap-2 transition-colors">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Limpiar Filtros
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-200">
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Nombre del Cliente</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Cédula</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Estado del Proceso</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Próxima Acción</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase">Responsable</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-gray-500 tracking-wider uppercase text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-[13px]">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs shrink-0">CM</div>
                                <span class="font-medium text-gray-900">Carlos Mario Montoya</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">1.020.345.678</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-100 text-red-700 tracking-wide">Tutela</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-bold text-red-600">24 Oct, 2023</span>
                                <span class="text-[10px] font-bold text-red-500 uppercase tracking-wide mt-0.5">Vence en 24h</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Dra. Claudia Pérez</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('clientes.show', 1) }}" class="text-[#1e325c] hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path></svg></a>
                                <button class="text-blue-600 hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                                <button class="text-red-500 hover:text-red-700 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs shrink-0">LG</div>
                                <span class="font-medium text-gray-900">Lucía González Rico</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">43.210.987</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-green-100 text-green-700 tracking-wide">Petición</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-800">05 Nov, 2023</span>
                                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide mt-0.5">Trámite Normal</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Dr. Alejandro Ruiz</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('clientes.show', 1) }}" class="text-[#1e325c] hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path></svg></a>
                                <button class="text-blue-600 hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                                <button class="text-red-500 hover:text-red-700 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-xs shrink-0">JR</div>
                                <span class="font-medium text-gray-900">Jorge Ramírez</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">71.882.331</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-100 text-blue-700 tracking-wide">SIC</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-800">28 Oct, 2023</span>
                                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide mt-0.5">Próximo Vencimiento</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Dra. Claudia Pérez</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('clientes.show', 1) }}" class="text-[#1e325c] hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path></svg></a>
                                <button class="text-blue-600 hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                                <button class="text-red-500 hover:text-red-700 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center font-bold text-xs shrink-0">AM</div>
                                <span class="font-medium text-gray-900">Adriana Morales</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">32.456.123</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-gray-100 text-gray-600 tracking-wide">Respuesta</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-800">12 Nov, 2023</span>
                                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide mt-0.5">En Espera de Correo</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Dr. Alejandro Ruiz</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('clientes.show', 1) }}" class="text-[#1e325c] hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path></svg></a>
                                <button class="text-blue-600 hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                                <button class="text-red-500 hover:text-red-700 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between bg-gray-50/50">
            <p class="text-[13px] text-gray-500 font-medium">Mostrando 1 a 10 de 124 clientes</p>
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white rounded hover:bg-gray-50 text-gray-500 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#0f172a] text-white rounded font-bold text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded font-medium text-sm transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded font-medium text-sm transition-colors">3</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white rounded hover:bg-gray-50 text-gray-500 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 flex justify-between shadow-sm">
            <div>
                <p class="text-[11px] font-bold text-gray-600 tracking-wider uppercase mb-1">Total Peticiones</p>
                <h3 class="text-4xl font-bold text-[#0f172a] mb-2">84</h3>
                <p class="text-xs font-semibold text-gray-800 flex items-center gap-1"><svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg> +12% esta semana</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <!-- Stat 2 -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 flex justify-between shadow-sm">
            <div>
                <p class="text-[11px] font-bold text-gray-600 tracking-wider uppercase mb-1">Vencimientos Próximos</p>
                <h3 class="text-4xl font-bold text-red-600 mb-2">12</h3>
                <p class="text-xs font-semibold text-red-600 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg> Requiere acción inmediata</p>
            </div>
            <div class="w-12 h-12 bg-red-100 text-red-500 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <!-- Stat 3 -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 flex justify-between shadow-sm">
            <div>
                <p class="text-[11px] font-bold text-gray-600 tracking-wider uppercase mb-1">Casos Exitosos</p>
                <h3 class="text-4xl font-bold text-emerald-500 mb-2">456</h3>
                <p class="text-xs font-semibold text-emerald-600 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> 94% de efectividad</p>
            </div>
            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <a href="{{ route('clientes.create') }}" class="fixed bottom-8 right-8 w-14 h-14 bg-[#0f172a] hover:bg-gray-800 text-white rounded-2xl shadow-xl flex items-center justify-center transition-all hover:-translate-y-1 z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
    </a>
</x-app-layout>
