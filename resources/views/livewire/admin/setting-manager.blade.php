<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Konfigurasi <span class="text-primary-600">Situs</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Atur identitas dan informasi kontak portfolio Anda.</p>
        </div>
        <button wire:click="save" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
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

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
        <div class="xl:col-span-2 space-y-10">
            <!-- General Settings -->
            <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
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
            <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
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
                </div>
            </div>
        </div>

            <!-- Media & Assets -->
            <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
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

        <div class="space-y-10">
            <!-- Information Box -->
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-10 rounded-[2.5rem] text-white shadow-2xl relative overflow-hidden">
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
