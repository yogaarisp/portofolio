@extends('layouts.admin')

@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-8 sm:space-y-12">
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Dashboard <span class="text-primary-600">Utama</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Selamat datang kembali, Yoga. Berikut adalah statistik portfolio Anda.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full md:w-auto">
            <button class="w-full sm:w-auto bg-white border border-slate-100 text-slate-600 px-6 py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-slate-50 transition-all shadow-sm">Ekspor Laporan</button>
            <a href="{{ route('admin.projects') }}" class="w-full sm:w-auto bg-primary-600 text-white px-6 py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 text-center no-underline flex items-center justify-center">Tambah Proyek</a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 sm:gap-8">
        @foreach([
            ['label' => 'Total Proyek', 'value' => sprintf('%02d', $stats['projects']), 'change' => 'Karya terbaik', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'gradient' => 'from-blue-600 to-indigo-600'],
            ['label' => 'Kategori Skill', 'value' => sprintf('%02d', $stats['skills']), 'change' => 'Teknologi terkini', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'gradient' => 'from-emerald-600 to-teal-600'],
            ['label' => 'Pengalaman', 'value' => sprintf('%02d', $stats['experiences']), 'change' => 'Tahun berkarya', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'gradient' => 'from-purple-600 to-fuchsia-600'],
            ['label' => 'Pesan Masuk', 'value' => '00', 'change' => 'Belum tersedia', 'icon' => 'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z', 'gradient' => 'from-rose-600 to-pink-600'],
        ] as $stat)
        <div class="bg-white p-5 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
            <div class="relative z-10">
                <div class="bg-gradient-to-tr {{ $stat['gradient'] }} w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center text-white shadow-lg mb-4 sm:mb-6 group-hover:scale-110 transition-transform duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                </div>
                <p class="text-[0.6rem] sm:text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">{{ $stat['value'] }}</p>
                    <p class="text-[0.65rem] font-bold text-emerald-500 uppercase tracking-wider">{{ $stat['change'] }}</p>
                </div>
            </div>
            <!-- Decorative Background Element -->
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-slate-50 rounded-full transition-transform group-hover:scale-150 duration-700"></div>
        </div>
        @endforeach
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 sm:gap-10">
        <!-- Project List Container -->
        <div class="xl:col-span-2 bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col">
            <div class="px-5 sm:px-10 py-6 sm:py-8 border-b border-slate-50 flex items-center justify-between gap-4">
                <div>
                    <h3 class="font-black text-slate-900 text-lg sm:text-xl tracking-tight uppercase">Daftar Proyek <span class="text-primary-600">Terbaru</span></h3>
                    <p class="text-slate-400 font-bold text-xs mt-1 uppercase tracking-widest">Aktivitas Terakhir</p>
                </div>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-50 text-slate-400 hover:bg-slate-100 transition-all hover:text-slate-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                </button>
            </div>
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-5 sm:px-10 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Info Proyek</th>
                            <th class="px-5 sm:px-10 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Teknologi</th>
                            <th class="px-5 sm:px-10 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                            <th class="px-5 sm:px-10 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($projects as $project)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="px-5 sm:px-10 py-7">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-primary-500 bg-opacity-10 flex items-center justify-center text-primary-600 flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-900 text-sm tracking-tight leading-none mb-1 group-hover:text-primary-600 transition-colors">{{ $project->name }}</p>
                                        <p class="text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest">{{ $project->status }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 sm:px-10 py-7">
                                <div class="flex gap-2">
                                    @foreach($project->tags as $tag)
                                    <span class="text-[0.6rem] font-black px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 uppercase tracking-widest border border-slate-200/50 group-hover:border-primary-200 group-hover:bg-primary-50 transition-all">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-5 sm:px-10 py-7">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ $project->status === 'published' ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                                    <span class="text-[0.65rem] font-black text-slate-700 uppercase tracking-widest">{{ $project->status }}</span>
                                </div>
                            </td>
                            <td class="px-5 sm:px-10 py-7">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.projects') }}" class="p-2 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="md:hidden p-4 space-y-3">
                @foreach($projects as $project)
                    <div class="rounded-2xl border border-slate-100 bg-slate-50/40 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-black text-slate-900 text-sm truncate">{{ $project->name }}</p>
                                <p class="text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $project->status }}</p>
                            </div>
                            <a href="{{ route('admin.projects') }}" class="p-2 rounded-xl bg-white border border-slate-100 text-slate-400 hover:bg-primary-600 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            </a>
                        </div>
                        <div class="flex gap-2 mt-3 flex-wrap">
                            @foreach($project->tags as $tag)
                                <span class="text-[0.55rem] font-black px-2.5 py-1 rounded-lg bg-white text-slate-600 uppercase tracking-widest border border-slate-200/70">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="p-6 sm:p-8 border-t border-slate-50 mt-auto flex justify-center">
                <a href="{{ route('admin.projects') }}" class="text-[0.7rem] font-black text-slate-400 uppercase tracking-[0.25em] hover:text-primary-600 transition-colors flex items-center gap-2 group no-underline">
                    Lihat Semua Proyek
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Right Side Widgets -->
        <div class="space-y-6 sm:space-y-10">
            <!-- Call to Action Widget -->
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-6 sm:p-10 rounded-[2rem] sm:rounded-[2.5rem] text-white shadow-2xl relative overflow-hidden group">
                <div class="relative z-10">
                    <div class="w-16 h-16 rounded-3xl bg-white/10 flex items-center justify-center mb-8 backdrop-blur-xl border border-white/20 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black tracking-tight leading-tight uppercase mb-4">Proyek <span class="text-primary-500">Baru?</span></h3>
                    <p class="text-slate-400 font-bold text-sm leading-relaxed mb-8">Pamerkan pencapaian teknis terbaru Anda dan buat klien terpukau.</p>
                    <a href="{{ route('admin.projects') }}" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-black text-xs uppercase tracking-[0.2em] py-5 rounded-2xl shadow-xl shadow-primary-600/20 transition-all flex items-center justify-center gap-3 no-underline">
                        Mulai Publikasi
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                    </a>
                </div>
                <!-- Abstract Design Elements -->
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl pointer-events-none transition-all group-hover:scale-150 duration-1000"></div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary-500/30 to-transparent"></div>
            </div>

            <!-- Profile Completion Widget -->
            <div class="bg-white p-6 sm:p-10 rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm relative overflow-hidden">
                <h3 class="font-black text-slate-900 text-lg uppercase tracking-tight mb-8">Kekuatan <span class="text-primary-600">Profil</span></h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-end">
                        <span class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest leading-none">Level Kelengkapan</span>
                        <span class="text-2xl font-black text-primary-600 leading-none">85%</span>
                    </div>
                    <div class="relative h-4 bg-slate-100 rounded-full overflow-hidden border-2 border-slate-50">
                        <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-primary-600 to-primary-400 rounded-full" style="width: 85%"></div>
                    </div>
                    <p class="text-xs font-bold text-slate-500 leading-relaxed">Satu langkah lagi! Tambahkan <span class="text-primary-600">"Case Study"</span> pada proyek terakhir Anda untuk mencapai 100%.</p>
                    <a href="{{ route('admin.settings') }}" class="text-[0.65rem] font-black text-primary-600 uppercase tracking-[0.15em] border-b-2 border-primary-100 hover:border-primary-600 transition-all pb-1 no-underline">Optimalkan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

