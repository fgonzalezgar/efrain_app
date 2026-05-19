<x-app-layout>
    <div class="max-w-4xl mx-auto py-4">
        <!-- Header -->
        <div class="mb-6">
            <nav class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                <a href="{{ route('responsibles.index') }}" class="hover:text-[#1e58c8] transition-colors">Responsables</a>
                <span class="text-gray-300">/</span>
                <span class="text-[#0f172a]">Nuevo Responsable</span>
            </nav>
            <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Crear Nuevo Responsable</h1>
            <p class="text-[15px] text-gray-600 mt-1">Configure el perfil profesional y los permisos del sistema para el nuevo integrante del equipo legal.</p>
        </div>

        <form action="{{ route('responsibles.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Información Personal -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
                <h2 class="text-lg font-bold text-[#0f172a] mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Información Personal
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Nombre Completo</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors" placeholder="Ej: Dr. Alejandro Martínez" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="document" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Número de Identificación</label>
                        <input type="text" id="document" name="document" value="{{ old('document') }}" class="w-full border @error('document') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors" placeholder="C.C. o T.P." required>
                        @error('document')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Correo Electrónico Institucional</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors" placeholder="a.martinez@juristech.co" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Teléfono de Contacto</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors" placeholder="+57 300 000 0000">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Perfil Profesional -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
                <h2 class="text-lg font-bold text-[#0f172a] mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Perfil Profesional
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="specialty" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Especialidad Principal</label>
                        <select id="specialty" name="specialty" class="w-full border @error('specialty') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors bg-white" required>
                            <option value="" disabled {{ old('specialty') ? '' : 'selected' }}>Seleccione especialidad</option>
                            <option value="Derecho Civil" {{ old('specialty') == 'Derecho Civil' ? 'selected' : '' }}>Derecho Civil</option>
                            <option value="Derecho Comercial" {{ old('specialty') == 'Derecho Comercial' ? 'selected' : '' }}>Derecho Comercial</option>
                            <option value="Derecho Administrativo" {{ old('specialty') == 'Derecho Administrativo' ? 'selected' : '' }}>Derecho Administrativo</option>
                            <option value="Derecho Laboral" {{ old('specialty') == 'Derecho Laboral' ? 'selected' : '' }}>Derecho Laboral</option>
                            <option value="Derecho Penal" {{ old('specialty') == 'Derecho Penal' ? 'selected' : '' }}>Derecho Penal</option>
                        </select>
                        @error('specialty')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="role" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Rol en el Equipo</label>
                        <select id="role" name="role" class="w-full border @error('role') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors bg-white" required>
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Seleccione rol</option>
                            <option value="Senior Attorney" {{ old('role') == 'Senior Attorney' ? 'selected' : '' }}>Senior Attorney</option>
                            <option value="Junior Lawyer" {{ old('role') == 'Junior Lawyer' ? 'selected' : '' }}>Junior Lawyer</option>
                            <option value="Paralegal" {{ old('role') == 'Paralegal' ? 'selected' : '' }}>Paralegal</option>
                            <option value="Legal Assistant" {{ old('role') == 'Legal Assistant' ? 'selected' : '' }}>Legal Assistant</option>
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="location" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Sede Asignada</label>
                        <select id="location" name="location" class="w-full border @error('location') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors bg-white" required>
                            <option value="" disabled {{ old('location') ? '' : 'selected' }}>Seleccione sede</option>
                            <option value="Bogotá D.C. - Principal" {{ old('location') == 'Bogotá D.C. - Principal' ? 'selected' : '' }}>Bogotá D.C. - Principal</option>
                            <option value="Medellín - Norte" {{ old('location') == 'Medellín - Norte' ? 'selected' : '' }}>Medellín - Norte</option>
                            <option value="Cali - Centro" {{ old('location') == 'Cali - Centro' ? 'selected' : '' }}>Cali - Centro</option>
                            <option value="Remoto" {{ old('location') == 'Remoto' ? 'selected' : '' }}>Remoto</option>
                        </select>
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="resume" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Resumen de Trayectoria (Opcional)</label>
                    <textarea id="resume" name="resume" rows="3" class="w-full border @error('resume') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-[#1e58c8] focus:ring-1 focus:ring-[#1e58c8] text-sm py-2.5 px-3 transition-colors" placeholder="Breve descripción del perfil profesional y casos destacados...">{{ old('resume') }}</textarea>
                    @error('resume')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Acceso al Sistema -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
                <h2 class="text-lg font-bold text-[#0f172a] mb-2 flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Acceso al Sistema
                </h2>
                <p class="text-sm text-gray-600 mb-6">Defina los niveles de permiso para la gestión de datos y expedientes de crédito.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <label class="block border border-gray-200 rounded-xl p-5 cursor-pointer hover:border-[#1e58c8] transition-colors relative @error('permissions') border-red-500 @enderror">
                        <div class="flex justify-between items-start mb-2">
                            <span class="font-bold text-gray-900 text-sm">Gestión de Expedientes</span>
                            <input type="checkbox" name="permissions[]" value="cases" class="w-4 h-4 text-[#1e58c8] rounded border-gray-300 focus:ring-[#1e58c8]" {{ is_array(old('permissions')) && in_array('cases', old('permissions')) ? 'checked' : '' }}>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">Crear, editar y archivar casos legales de clientes.</p>
                    </label>
                    
                    <label class="block border border-gray-200 rounded-xl p-5 cursor-pointer hover:border-[#1e58c8] transition-colors relative @error('permissions') border-red-500 @enderror">
                        <div class="flex justify-between items-start mb-2">
                            <span class="font-bold text-gray-900 text-sm">Aprobación de Tutelas</span>
                            <input type="checkbox" name="permissions[]" value="approvals" class="w-4 h-4 text-[#1e58c8] rounded border-gray-300 focus:ring-[#1e58c8]" {{ is_array(old('permissions')) && in_array('approvals', old('permissions')) ? 'checked' : '' }}>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">Facultad para firmar y validar procesos de tutela.</p>
                    </label>
                    
                    <label class="block border border-gray-200 rounded-xl p-5 cursor-pointer hover:border-[#1e58c8] transition-colors relative @error('permissions') border-red-500 @enderror">
                        <div class="flex justify-between items-start mb-2">
                            <span class="font-bold text-gray-900 text-sm">Reportes y Auditoría</span>
                            <input type="checkbox" name="permissions[]" value="reports" class="w-4 h-4 text-[#1e58c8] rounded border-gray-300 focus:ring-[#1e58c8]" {{ is_array(old('permissions')) && in_array('reports', old('permissions')) ? 'checked' : '' }}>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">Acceso a paneles de estadísticas y exportación de datos.</p>
                    </label>
                </div>
                @error('permissions')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                @error('permissions.*')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Footer Actions -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('responsibles.index') }}" class="px-6 py-2.5 text-sm font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                    CANCELAR
                </a>
                <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-[#1e58c8] hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
                    GUARDAR RESPONSABLE
                </button>
            </div>
            
            <!-- Graphic Footer Mockup -->
            <div class="mt-12 flex items-center justify-between opacity-50 grayscale pointer-events-none">
                <div class="w-[48%] h-24 bg-gray-200 rounded overflow-hidden relative">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=800&auto=format&fit=crop');"></div>
                </div>
                <div class="w-[48%] h-24 bg-gray-200 rounded overflow-hidden relative">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=800&auto=format&fit=crop');"></div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
