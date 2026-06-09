<div class="space-y-10">
    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
        <div class="flex items-start gap-4">
            <div class="w-11 h-11 rounded-2xl bg-primary-50 text-primary-600 border border-primary-100 shadow-sm flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
            </div>
            <div>
                <p class="text-[0.62rem] font-black text-primary-600 uppercase tracking-[0.22em]">Admin Workspace</p>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mt-1">Konfigurasi <span class="text-primary-600">Situs</span></h2>
                <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Atur identitas dan informasi kontak portfolio Anda.</p>
            </div>
        </div>
        <button wire:click="save" class="admin-btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            Simpan Perubahan
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 animate-fade-in-down">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 sm:gap-10">
        <div class="xl:col-span-2 space-y-6 sm:space-y-10">
            <!-- General Settings -->
            <div class="bg-white p-5 sm:p-8 lg:p-10 rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h3 class="font-black text-slate-900 uppercase tracking-tight">Identitas <span class="text-primary-600">Dasar</span></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Situs / Nama Anda</label>
                        <input type="text" wire:model="site_name" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Email Kontak</label>
                        <input type="email" wire:model="contact_email" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Judul Hero (Headline)</label>
                    <input type="text" wire:model="hero_title" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                </div>

                <div class="space-y-3">
                    <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Sub-judul Hero (Description)</label>
                    <textarea wire:model="hero_subtitle" rows="3" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4">
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Years Experience</label>
                        <input type="text" wire:model="years_experience" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Projects Count</label>
                        <input type="text" wire:model="projects_count" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Client Satisfaction</label>
                        <input type="text" wire:model="client_satisfaction" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white p-5 sm:p-8 lg:p-10 rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </div>
                    <h3 class="font-black text-slate-900 uppercase tracking-tight">Tautan <span class="text-primary-600">Sosial</span></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">LinkedIn URL</label>
                        <input type="text" wire:model="linkedin_url" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="https://linkedin.com/in/...">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">GitHub URL</label>
                        <input type="text" wire:model="github_url" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="https://github.com/...">
                    </div>
                    <div class="space-y-3 md:col-span-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nomor WhatsApp (Gunakan Kode Negara, misal: 628123456789)</label>
                        <div class="relative">
                            <input type="text" wire:model="whatsapp_number" class="w-full bg-slate-50 border-slate-100 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="628xxxxxxxx">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">
                                <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.313 1.592 5.448 0 9.886-4.438 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.438-9.89 9.886-.001 2.106.635 3.557 1.684 5.365l-1.012 3.7 3.897-1.021zm11.238-7.834c.303.151.303.454.151.758-.151.302-.605.454-1.059.605-.454.151-.908.303-1.362.454-1.512.605-2.571-1.21-3.025-1.512-.454-.303-.908-.454-1.21-.605-.303-.151-.605-.303-.908-.454-.303-.151-.454-.303-.454-.454s.151-.303.454-.454c.303-.151.605-.303.908-.454.303-.151.605-.151.757-.151s.303.151.303.454c.151.303.605 1.512.605 1.664.001.151.151.303 0 .454-.151.151-.303.303-.454.454-.151.151-.303.303-.151.454.303.454 1.21 2.118 2.723 2.572.454.151.908.151 1.21 0 .303-.151.605-.605.757-1.059.151-.454.454-.757.605-.757.151 0 .454.151.908.303z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumen CV -->
            <div class="bg-white p-5 sm:p-8 lg:p-10 rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8 mt-6 sm:mt-10">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-black text-slate-900 uppercase tracking-tight">Dokumen <span class="text-primary-600">CV</span></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Upload File PDF</label>
                        <div class="relative group">
                            <div class="w-full h-32 rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-primary-300">
                                @if ($cv_file)
                                    <svg class="w-8 h-8 text-emerald-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <p class="text-[0.6rem] font-bold text-emerald-600 uppercase tracking-widest">File Terpilih</p>
                                @else
                                    <svg class="w-8 h-8 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    <p class="text-[0.6rem] font-bold text-slate-400 uppercase tracking-widest">Pilih File CV (PDF)</p>
                                @endif
                                <input type="file" wire:model="cv_file" accept="application/pdf" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                            <div wire:loading wire:target="cv_file" class="absolute inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center rounded-3xl">
                                <svg class="animate-spin h-5 w-5 text-primary-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </div>
                        </div>
                        @error('cv_file') <span class="text-xs text-rose-500 font-bold mt-1 block px-2">{{ $message }}</span> @enderror
                        <p class="text-[0.6rem] text-slate-400 font-medium px-2 italic">* Format: PDF, Maksimal 5MB</p>
                    </div>

                    <div class="space-y-4">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Status CV Saat Ini</label>
                        <div class="w-full h-32 rounded-3xl border-2 border-slate-100 flex flex-col items-center justify-center p-4">
                            @if ($cv_file_path && Storage::disk('public')->exists($cv_file_path))
                                <div class="text-center flex flex-col items-center">
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3.5 rounded-full text-[0.7rem] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 mb-3">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> CV Sudah Diupload
                                    </span>
                                    <div class="flex items-center justify-center gap-3 mt-1">
                                        <a href="{{ Storage::url($cv_file_path) }}" target="_blank" class="text-[0.65rem] font-black uppercase tracking-widest text-primary-600 bg-primary-50 hover:bg-primary-100 px-4 py-2 rounded-xl transition-colors">Lihat</a>
                                        <button type="button" wire:click="deleteCV" wire:confirm="Yakin ingin menghapus CV ini?" class="text-[0.65rem] font-black uppercase tracking-widest text-rose-600 bg-rose-50 hover:bg-rose-100 px-4 py-2 rounded-xl transition-colors">Hapus</button>
                                    </div>
                                </div>
                            @else
                                <div class="text-center flex flex-col items-center">
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3.5 rounded-full text-[0.7rem] font-black uppercase tracking-widest bg-slate-100 text-slate-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Belum ada CV
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Media & Assets -->
            <div class="bg-white p-5 sm:p-8 lg:p-10 rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-black text-slate-900 uppercase tracking-tight">Media & <span class="text-primary-600">Aset</span></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Hero Image -->
                    <div class="space-y-4">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Hero Image</label>
                        <div class="relative group">
                            <div class="w-full h-48 rounded-[2rem] bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-primary-300">
                                @if ($hero_image)
                                    <img src="{{ $hero_image->temporaryUrl() }}" class="w-full h-full object-cover">
                                @elseif ($hero_image_path)
                                    <img src="{{ Storage::url($hero_image_path) }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-10 h-10 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <p class="text-[0.6rem] font-bold text-slate-400 uppercase tracking-widest">Pilih Foto Hero</p>
                                @endif
                                <input type="file" wire:model="hero_image" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                            <div wire:loading wire:target="hero_image" class="absolute inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center rounded-[2rem]">
                                <svg class="animate-spin h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </div>
                        </div>
                        <p class="text-[0.6rem] text-slate-400 font-medium px-2 italic">* Rekomendasi: 800x1000px (Aspect Ratio 4:5)</p>
                    </div>

                    <!-- Favicon -->
                    <div class="space-y-4">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Site Favicon</label>
                        <div class="relative group">
                            <div class="w-32 h-32 rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-primary-300 mx-auto">
                                @if ($favicon)
                                    <img src="{{ $favicon->temporaryUrl() }}" class="w-full h-full object-contain p-4">
                                @elseif ($favicon_path)
                                    <img src="{{ Storage::url($favicon_path) }}" class="w-full h-full object-contain p-4">
                                @else
                                    <svg class="w-8 h-8 text-slate-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"/></svg>
                                    <p class="text-[0.55rem] font-bold text-slate-400 uppercase tracking-widest">Pilih Icon</p>
                                @endif
                                <input type="file" wire:model="favicon" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                            <div wire:loading wire:target="favicon" class="absolute inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center rounded-3xl">
                                <svg class="animate-spin h-5 w-5 text-primary-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </div>
                        </div>
                        <p class="text-[0.6rem] text-slate-400 font-medium text-center italic">* Gunakan file .png atau .ico (32x32px)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 sm:space-y-10">
            <!-- Information Box -->
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-6 sm:p-8 lg:p-10 rounded-[2rem] sm:rounded-[2.5rem] text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-xl font-black uppercase tracking-tight mb-6">Tips <span class="text-primary-500">Kustomisasi</span></h3>
                    <ul class="space-y-4">
                        <li class="flex gap-3 text-sm text-slate-400 font-medium">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            Gunakan Nama yang profesional untuk personal branding.
                        </li>
                        <li class="flex gap-3 text-sm text-slate-400 font-medium">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            Headline harus mencerminkan spesialisasi teknis utama Anda.
                        </li>
                        <li class="flex gap-3 text-sm text-slate-400 font-medium">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            Pastikan URL sosial media aktif dan valid.
                        </li>
                    </ul>
                </div>
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary-500/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
</div>
