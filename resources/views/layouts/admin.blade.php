<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | {{ $settings['site_name'] ?? 'Yoga Aris Purwanto' }}</title>
    
    @if(!empty($settings['favicon_path']))
        <link rel="icon" type="image/png" href="{{ Storage::url($settings['favicon_path']) }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        [x-cloak] { display: none !important; }
        .sidebar-item-active {
            background-color: var(--color-primary-600);
            color: white !important;
            box-shadow: 0 10px 15px -3px rgba(13, 148, 136, 0.2);
        }
    </style>
</head>
<body class="bg-[#F1F5F9] font-sans antialiased text-slate-800" x-data="{ sidebarOpen: true, mobileMenu: false }">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Desktop -->
        <aside 
            class="relative z-30 flex-shrink-0 bg-white border-r border-slate-200 transition-all duration-500 ease-in-out hidden lg:block"
            :class="sidebarOpen ? 'w-72' : 'w-24'"
        >
            <div class="flex flex-col h-full">
                <!-- Branding -->
                <div class="flex items-center h-24 px-6 border-b border-slate-50">
                    <div class="flex items-center gap-4 overflow-hidden">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-primary-700 to-primary-500 flex items-center justify-center text-white shadow-lg shadow-primary-600/30 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.247 18.477 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div class="transition-all duration-300 transform" :class="sidebarOpen ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10 pointer-events-none'">
                            <p class="font-black text-xl text-slate-900 tracking-tight leading-none uppercase">KeeTech</p>
                            <p class="text-[0.65rem] font-bold text-primary-600 tracking-[0.2em] mt-1 uppercase">Admin Panel</p>
                        </div>
                    </div>
                </div>

                <!-- Main Nav -->
                <nav class="flex-1 overflow-y-auto py-8 px-4 space-y-2 custom-scrollbar">
                    <p class="text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em] px-4 mb-4" x-show="sidebarOpen">Menu Utama</p>
                    
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/25' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-6 h-6 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span class="font-bold text-sm tracking-wide" x-show="sidebarOpen" x-transition>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.projects') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.projects') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/25' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-6 h-6 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span class="font-bold text-sm tracking-wide" x-show="sidebarOpen" x-transition>Kelola Proyek</span>
                    </a>

                    <a href="{{ route('admin.skills') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.skills') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/25' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-6 h-6 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <span class="font-bold text-sm tracking-wide" x-show="sidebarOpen" x-transition>Daftar Skills</span>
                    </a>

                    <a href="{{ route('admin.experiences') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.experiences') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/25' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-6 h-6 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="font-bold text-sm tracking-wide" x-show="sidebarOpen" x-transition>Kelola Pengalaman</span>
                    </a>

                    <div class="pt-8 pb-4" x-show="sidebarOpen">
                        <p class="text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em] px-4">Preferensi</p>
                    </div>

                    <a href="{{ route('admin.settings') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.settings') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/25' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-6 h-6 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="font-bold text-sm tracking-wide" x-show="sidebarOpen" x-transition>Pengaturan</span>
                    </a>
                </nav>

                <!-- Profile Small Card -->
                <div class="p-6">
                    <div class="bg-slate-50 rounded-3xl p-4 flex items-center gap-3 border border-slate-100 overflow-hidden transition-all duration-300" :class="sidebarOpen ? 'px-4' : 'px-0 justify-center'">
                        <img src="https://ui-avatars.com/api/?name=Yoga+Aris&background=0d9488&color=fff" class="w-10 h-10 rounded-2xl shadow-sm flex-shrink-0" alt="">
                        <div class="transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">
                            <p class="font-black text-xs text-slate-900 leading-none">Yoga Aris P.</p>
                            <p class="text-[0.6rem] font-bold text-slate-400 mt-1 uppercase tracking-wider">Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#F1F5F9]">
            <!-- Topbar -->
            <header class="h-24 flex items-center justify-between px-8 bg-white/80 backdrop-blur-xl border-b border-slate-100 sticky top-0 z-20">
                <div class="flex items-center gap-6">
                    <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-50 text-slate-500 hover:bg-primary-50 hover:text-primary-600 transition-all duration-300 shadow-sm border border-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    </button>
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 tracking-tight leading-none uppercase">@yield('page_title', 'Ringkasan')</h1>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <p class="text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest">Sistem Aktif</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden md:flex relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input type="text" placeholder="Cari apapun..." class="bg-slate-50 border-slate-100 rounded-2xl pl-12 pr-6 py-3 text-sm font-medium w-80 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <button class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border border-slate-100 text-slate-500 hover:bg-slate-50 transition-colors relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-3 right-3 w-2.5 h-2.5 bg-rose-500 border-2 border-white rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-8 lg:p-12 space-y-10 custom-scrollbar">
                @yield('content')
            </main>
        </div>
    </div>


    @livewireScripts
</body>
</html>
