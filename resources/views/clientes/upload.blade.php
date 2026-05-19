<x-app-layout>
    <div class="max-w-4xl mx-auto py-4">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-[28px] font-bold text-[#0f172a] tracking-tight">Importar Clientes</h1>
            <p class="text-[15px] text-gray-600 mt-1">Sube un archivo con los datos de tus clientes para añadirlos masivamente al sistema.</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <!-- Formulario de Importación -->
            <form action="{{ route('clientes.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-8">
                <!-- Drag & Drop Area con Alpine.js -->
                <div x-data="{ fileName: '', dragOver: false }" 
                     class="border-2 border-dashed rounded-xl p-12 flex flex-col items-center justify-center text-center transition-all cursor-pointer group"
                     :class="dragOver ? 'border-blue-500 bg-blue-50' : 'border-gray-300 hover:border-blue-500 hover:bg-blue-50/50'"
                     @dragover.prevent="dragOver = true"
                     @dragleave.prevent="dragOver = false"
                     @drop.prevent="dragOver = false; if($event.dataTransfer.files.length > 0) { $refs.fileInput.files = $event.dataTransfer.files; fileName = $event.dataTransfer.files[0].name; }"
                     @click="$refs.fileInput.click()">
                    
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0f172a] mb-1" x-text="fileName ? 'Archivo seleccionado: ' + fileName : 'Haz clic para subir o arrastra tu archivo aquí'"></h3>
                    <p class="text-sm text-gray-500 mb-6" x-show="!fileName">Formatos soportados: CSV (Máximo 10MB)</p>
                    
                    <button type="button" class="bg-white border border-gray-300 text-gray-700 font-semibold py-2 px-6 rounded-lg text-sm shadow-sm hover:bg-gray-50 transition-colors" x-show="!fileName">
                        Seleccionar Archivo
                    </button>
                    <!-- Hidden file input -->
                    <input type="file" name="file" x-ref="fileInput" class="hidden" accept=".csv, .txt" @change="if($event.target.files.length > 0) { fileName = $event.target.files[0].name; }" required>
                </div>

                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <!-- Format Info -->
                    <div class="bg-gray-50 border border-gray-100 rounded-lg p-5">
                        <h4 class="text-sm font-bold text-[#0f172a] flex items-center gap-2 mb-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Estructura Requerida
                        </h4>
                        <p class="text-[13px] text-gray-600 mb-3 leading-relaxed">
                            Asegúrate de que tu archivo incluya estas columnas en la primera fila (encabezados):
                        </p>
                        <ul class="text-[12px] font-medium text-gray-500 space-y-1.5 list-disc list-inside">
                            <li><span class="text-gray-800">Nombre completo</span> (Obligatorio)</li>
                            <li><span class="text-gray-800">Cédula</span> (Obligatorio)</li>
                            <li><span class="text-gray-800">Correo Electrónico</span></li>
                            <li><span class="text-gray-800">Teléfono</span></li>
                            <li><span class="text-gray-800">Departamento</span> (Obligatorio)</li>
                            <li><span class="text-gray-800">Municipio</span> (Obligatorio)</li>
                            <li><span class="text-gray-800">Estado Inicial</span> (Obligatorio)</li>
                            <li><span class="text-gray-800">Central de Riesgo</span> (Obligatorio)</li>
                        </ul>
                    </div>

                    <!-- Template Download -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-5 flex flex-col justify-center">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white rounded-lg shadow-sm flex items-center justify-center shrink-0 text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#0f172a] mb-1">¿No tienes la estructura?</h4>
                                <p class="text-[13px] text-gray-600 mb-3">Descarga nuestra plantilla de ejemplo para asegurar una importación exitosa.</p>
                                <a href="{{ route('clientes.template') }}" class="text-[13px] font-bold text-[#1e58c8] hover:text-blue-800 flex items-center gap-1.5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Descargar Plantilla CSV
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 border-t border-gray-200 p-5 flex items-center justify-end gap-3">
                <a href="{{ route('clientes.index') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-200 rounded-lg transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg text-sm shadow-sm transition-colors">
                    Importar Clientes
                </button>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
