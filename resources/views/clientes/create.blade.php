<x-app-layout>
    <div class="max-w-4xl mx-auto py-4">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Registrar Nuevo Cliente</h1>
            <p class="text-[15px] text-gray-600 mt-1">Ingresa los datos personales y los detalles del proceso para añadir un nuevo expediente al sistema.</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            @csrf
            
            <div class="p-8 space-y-8">
                <!-- Sección: Datos Personales -->
                <div>
                    <h2 class="text-sm font-bold text-[#0f172a] uppercase tracking-wide mb-4 border-b border-gray-100 pb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Datos Personales
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5">Nombre Completo <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="Ej. Carlos Eduardo Méndez" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="document" class="block text-sm font-bold text-gray-700 mb-1.5">Número de Cédula <span class="text-red-500">*</span></label>
                            <input type="text" id="document" name="document" value="{{ old('document') }}" class="w-full border @error('document') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="Ej. 1032445892" required>
                            @error('document')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div x-data="locationSelect('{{ old('department_id') }}', '{{ old('municipality_id') }}')" class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="department_id" class="block text-sm font-bold text-gray-700 mb-1.5">Departamento <span class="text-red-500">*</span></label>
                            <select id="department_id" name="department_id" x-model="department_id" @change="fetchMunicipalities()" class="w-full border @error('department_id') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors bg-white" required>
                                <option value="" disabled>Seleccione un departamento</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="municipality_id" class="block text-sm font-bold text-gray-700 mb-1.5">Municipio / Ciudad <span class="text-red-500">*</span></label>
                            <select id="municipality_id" name="municipality_id" x-model="municipality_id" :disabled="loading || municipalities.length === 0" class="w-full border @error('municipality_id') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors bg-white" required>
                                <option value="" disabled x-text="loading ? 'Cargando...' : 'Seleccione un municipio'"></option>
                                <template x-for="municipality in municipalities" :key="municipality.id">
                                    <option :value="municipality.id" x-text="municipality.name" :selected="municipality.id == old_municipality_id"></option>
                                </template>
                            </select>
                            @error('municipality_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección: Información de Contacto -->
                <div>
                    <h2 class="text-sm font-bold text-[#0f172a] uppercase tracking-wide mb-4 border-b border-gray-100 pb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Información de Contacto
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Correo Electrónico</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="ejemplo@correo.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-1.5">Teléfono Móvil</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="Ej. +57 300 000 0000">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección: Detalles del Proceso -->
                <div>
                    <h2 class="text-sm font-bold text-[#0f172a] uppercase tracking-wide mb-4 border-b border-gray-100 pb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#1e58c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Detalles del Proceso Legal
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2 mb-2">
                            <label for="responsible_id" class="block text-sm font-bold text-gray-700 mb-1.5">Abogado / Profesional Responsable</label>
                            <select id="responsible_id" name="responsible_id" class="w-full border @error('responsible_id') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors bg-white">
                                <option value="" {{ old('responsible_id') ? '' : 'selected' }}>Sin asignar (Opcional)</option>
                                @foreach($responsibles as $responsible)
                                    <option value="{{ $responsible->id }}" {{ old('responsible_id') == $responsible->id ? 'selected' : '' }}>{{ $responsible->name }} ({{ $responsible->role }})</option>
                                @endforeach
                            </select>
                            @error('responsible_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1.5">Puedes asignar el responsable del caso ahora o dejarlo en blanco para asignarlo más tarde.</p>
                        </div>

                        <div>
                            <label for="initial_status" class="block text-sm font-bold text-gray-700 mb-1.5">Estado Inicial del Proceso <span class="text-red-500">*</span></label>
                            <select id="initial_status" name="initial_status" class="w-full border @error('initial_status') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors bg-white" required>
                                <option value="" disabled {{ old('initial_status') ? '' : 'selected' }}>Seleccione el estado actual</option>
                                <option value="peticion" {{ old('initial_status') == 'peticion' ? 'selected' : '' }}>Petición Inicial</option>
                                <option value="respuesta" {{ old('initial_status') == 'respuesta' ? 'selected' : '' }}>Esperando Respuesta</option>
                                <option value="tutela" {{ old('initial_status') == 'tutela' ? 'selected' : '' }}>Acción de Tutela</option>
                                <option value="sic" {{ old('initial_status') == 'sic' ? 'selected' : '' }}>Queja ante la SIC</option>
                            </select>
                            @error('initial_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Central de Riesgo Principal <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-4 mt-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="bureau" value="datacredito" class="w-4 h-4 text-[#1e58c8] focus:ring-[#1e58c8] border-gray-300" {{ old('bureau', 'datacredito') == 'datacredito' ? 'checked' : '' }}>
                                    <span class="text-sm font-medium text-gray-700">Datacrédito</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="bureau" value="cifin" class="w-4 h-4 text-[#1e58c8] focus:ring-[#1e58c8] border-gray-300" {{ old('bureau') == 'cifin' ? 'checked' : '' }}>
                                    <span class="text-sm font-medium text-gray-700">Cifin</span>
                                </label>
                            </div>
                            @error('bureau')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label for="notes" class="block text-sm font-bold text-gray-700 mb-1.5">Observaciones Iniciales</label>
                        <textarea id="notes" name="notes" rows="3" class="w-full border @error('notes') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2.5 px-3 transition-colors" placeholder="Agrega cualquier detalle relevante sobre el reporte negativo o la deuda...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 border-t border-gray-200 p-5 flex items-center justify-end gap-3">
                <a href="{{ route('clientes.index') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-200 rounded-lg transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg text-sm shadow-sm flex items-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Guardar Cliente
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('locationSelect', (oldDepartmentId, oldMunicipalityId) => ({
            department_id: oldDepartmentId || '',
            municipality_id: oldMunicipalityId || '',
            old_municipality_id: oldMunicipalityId || '',
            municipalities: [],
            loading: false,

            init() {
                if (this.department_id) {
                    this.fetchMunicipalities();
                }
            },

            fetchMunicipalities() {
                if (!this.department_id) {
                    this.municipalities = [];
                    this.municipality_id = '';
                    return;
                }
                
                this.loading = true;
                this.municipality_id = '';
                
                fetch(`/api/departamentos/${this.department_id}/municipios`)
                    .then(response => response.json())
                    .then(data => {
                        this.municipalities = data;
                        this.loading = false;
                        
                        // Si hay un valor viejo, reasignarlo después de cargar
                        if(this.old_municipality_id && this.municipalities.find(m => m.id == this.old_municipality_id)) {
                            this.municipality_id = this.old_municipality_id;
                            this.old_municipality_id = ''; // Limpiar para futuros cambios
                        }
                    })
                    .catch(() => {
                        this.loading = false;
                        this.municipalities = [];
                    });
            }
        }));
    });
</script>
