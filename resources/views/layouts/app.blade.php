<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JurisTech') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#f8fafc] text-gray-900">
        <div class="min-h-screen flex">
            
            <!-- Sidebar -->
            <aside class="w-[240px] bg-white border-r border-gray-200 flex-col hidden md:flex h-screen sticky top-0">
                <!-- Logo -->
                <div class="h-[72px] flex items-center px-6 border-b border-gray-100 shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="JurisTech" class="h-12 w-auto object-contain">
                    </a>
                </div>

                <!-- Main Navigation -->
                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }} text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('clientes.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('clientes.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }} text-sm transition-colors mt-2">
                        <svg class="w-5 h-5 {{ request()->routeIs('clientes.*') ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Clientes
                    </a>
                    <a href="{{ route('calendario.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('calendario.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }} text-sm transition-colors mt-2">
                        <svg class="w-5 h-5 {{ request()->routeIs('calendario.*') ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Calendario
                    </a>
                    <a href="{{ route('responsibles.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('responsibles.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }} text-sm transition-colors mt-2">
                        <svg class="w-5 h-5 {{ request()->routeIs('responsibles.*') ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Responsables
                    </a>
                    <a href="{{ route('procesos.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('procesos.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium' }} text-sm transition-colors mt-2">
                        <svg class="w-5 h-5 {{ request()->routeIs('procesos.*') ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Procesos
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium text-sm transition-colors mt-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Configuración
                    </a>
                </nav>

                <!-- Bottom Sidebar -->
                <div class="px-4 py-6 border-t border-gray-100 shrink-0">
                    <a href="{{ route('procesos.create') }}" class="block w-full text-center bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm transition-colors mb-6">
                        Radicar Queja
                    </a>
                    
                    <div class="space-y-1">
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Soporte
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg font-medium text-sm transition-colors text-left">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <!-- Content Wrapper -->
            <div class="flex-1 flex flex-col min-w-0">
                
                <!-- Topbar -->
                <header class="h-[72px] bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-10 shrink-0">
                    <!-- Top Navigation (Tabs or Search) -->
                    <div class="flex items-center gap-8 h-full flex-1">
                        @if(request()->routeIs('dashboard'))
                            <div class="hidden md:flex h-full items-center gap-8 text-[15px] font-semibold">
                                <a href="#" class="h-full flex items-center text-blue-600 border-b-2 border-blue-600">Dashboard</a>
                                <a href="{{ route('clientes.index') }}" class="h-full flex items-center text-gray-500 hover:text-gray-900 border-b-2 border-transparent transition-colors">Clientes</a>
                                <a href="#" class="h-full flex items-center text-gray-500 hover:text-gray-900 border-b-2 border-transparent transition-colors">Expedientes</a>
                            </div>
                        @elseif(request()->routeIs('clientes.index'))
                            <div class="hidden lg:block w-full max-w-xl">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-lg text-sm bg-gray-50 focus:bg-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Buscar por nombre o documento...">
                                </div>
                            </div>
                        @elseif(request()->routeIs('clientes.show'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('clientes.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Clientes</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Detalle de Proceso</span>
                            </div>
                            
                            <!-- Search bar small -->
                            <div class="ml-auto mr-8 hidden lg:block">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="text" class="block w-64 pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-sm bg-gray-50 focus:bg-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Buscar radicado...">
                                </div>
                            </div>
                        @elseif(request()->routeIs('clientes.upload'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('clientes.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Clientes</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Cargar Base de Datos</span>
                            </div>
                        @elseif(request()->routeIs('clientes.create'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('clientes.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Clientes</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Nuevo Cliente</span>
                            </div>
                        @elseif(request()->routeIs('responsibles.index'))
                            <div class="hidden lg:block w-full max-w-xl">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-lg text-sm bg-gray-50 focus:bg-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Buscar profesionales o casos...">
                                </div>
                            </div>
                        @elseif(request()->routeIs('responsibles.create'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('responsibles.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Responsables</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Nuevo Responsable</span>
                            </div>
                        @elseif(request()->routeIs('responsibles.upload'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('responsibles.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Responsables</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Cargar Base de Datos</span>
                            </div>
                        @elseif(request()->routeIs('procesos.create'))
                            <div class="hidden md:flex items-center text-sm font-semibold">
                                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Dashboard</a>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600">Procesos</span>
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-[#0f172a]">Registrar Nuevo Proceso</span>
                            </div>
                        @endif
                        <button class="md:hidden p-2 -ml-2 text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                    </div>

                    <!-- Right Actions -->
                    <div class="flex items-center gap-5">
                        @if(request()->routeIs('dashboard'))
                            <a href="{{ route('procesos.create') }}" class="hidden sm:block bg-[#1e58c8] hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm shadow-sm transition-colors">
                                Preparar Tutela
                            </a>
                        @elseif(request()->routeIs('clientes.index'))
                            <a href="{{ route('procesos.create') }}" class="hidden sm:block bg-[#0f172a] hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg text-sm shadow-sm transition-colors">
                                Preparar Tutela
                            </a>
                        @endif
                        
                        <div class="flex items-center gap-3 border-l border-gray-200 pl-5">
                            <button class="text-gray-400 hover:text-gray-600 transition-colors relative">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                <span class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                            </button>
                            <button class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <div class="flex items-center gap-3 ml-2">
                                @if(request()->routeIs('clientes.index'))
                                    <div class="hidden lg:block text-right">
                                        <p class="text-[13px] font-bold text-[#0f172a] leading-tight">Dr. Alejandro Ruiz</p>
                                        <p class="text-[11px] font-medium text-gray-500">Abogado Administrador</p>
                                    </div>
                                @endif
                                <div class="w-9 h-9 rounded-full bg-[#1e325c] text-white flex items-center justify-center font-bold text-sm overflow-hidden border-2 border-white shadow-sm ring-1 ring-gray-100 shrink-0">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1e325c&color=fff" alt="{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-6 md:p-8 overflow-y-auto">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>
