<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50/50">
        <div class="min-h-screen flex">
            <!-- Left Side: Login Form -->
            <div class="flex-1 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 bg-gray-50/50 lg:flex-none lg:w-1/2">
                <div class="w-full max-w-md mx-auto">
                    <div class="text-center mb-8">
                        <a href="/" class="inline-block">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="JurisTech" class="h-[72px] w-auto object-contain">
                        </a>
                        <p class="mt-2 text-[15px] text-gray-600">Gestión integral de clientes y seguimiento de procesos</p>
                    </div>

                    <div class="bg-white px-8 py-8 shadow-sm rounded-xl border border-gray-200">
                        {{ $slot }}
                    </div>

                    <div class="mt-8 flex justify-center items-center gap-6 text-xs text-gray-600 font-medium">
                        <a href="#" class="flex items-center gap-1.5 hover:text-gray-900 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Soporte Técnico
                        </a>
                        <a href="#" class="flex items-center gap-1.5 hover:text-gray-900 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Términos Legales
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Side: Background Image and Cards -->
            <div class="hidden lg:flex flex-1 relative bg-gray-900 overflow-hidden items-center justify-center p-12">
                <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/office_bg.png') }}" alt="Office Background">
                <div class="absolute inset-0 bg-gray-900/10"></div>
                
                <div class="relative z-10 w-full max-w-lg space-y-6 mt-32">
                    <!-- Card 1 -->
                    <div class="bg-[#f0f1f3]/95 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-white/20">
                        <svg class="w-6 h-6 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        <h3 class="text-[22px] font-semibold text-[#0f172a] mb-2">Optimización de Procesos</h3>
                        <p class="text-[15px] text-gray-600 leading-relaxed">
                            Nuestra plataforma reduce los tiempos de radicación de quejas ante Datacrédito en un 65% mediante automatización inteligente.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-[#f4f5f6]/95 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-white/20 ml-12">
                        <svg class="w-6 h-6 text-emerald-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <h3 class="text-[22px] font-semibold text-[#0f172a] mb-2">Seguridad Jurídica</h3>
                        <p class="text-[15px] text-gray-600 leading-relaxed">
                            Cumplimiento total con la Ley de Habeas Data y protocolos de protección de información sensible.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
