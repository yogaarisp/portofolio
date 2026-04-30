<div class="space-y-10">
    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
        <div class="flex items-start gap-4">
            <div class="w-11 h-11 rounded-2xl bg-primary-50 text-primary-600 border border-primary-100 shadow-sm flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m14.364 6.364l-1.414-1.414M8.05 8.05L6.636 6.636m10.728 0L15.95 8.05M8.05 15.95l-1.414 1.414"/></svg>
            </div>
            <div>
                <p class="text-[0.62rem] font-black text-primary-600 uppercase tracking-[0.22em]">Admin Workspace</p>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mt-1">Daftar <span class="text-primary-600">Skills</span></h2>
                <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola keahlian teknis dan kategori Anda.</p>
            </div>
        </div>
        <button wire:click="openModal" class="admin-btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Skill
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 animate-fade-in-down">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @php $currentCategory = ''; @endphp
        @foreach($skills as $skill)
            @if($currentCategory !== $skill->category)
                @php $currentCategory = $skill->category; @endphp
                <div class="col-span-1 md:col-span-2 xl:col-span-3 pt-10 first:pt-2">
                    <div class="flex items-center gap-4">
                        <span class="text-[0.65rem] font-black text-primary-600 uppercase tracking-[0.4em] bg-primary-50 px-4 py-2 rounded-lg border border-primary-100">{{ $skill->category }}</span>
                        <div class="h-px bg-slate-100 flex-1"></div>
                    </div>
                </div>
            @endif
            
            <div class="bg-white p-4 sm:p-5 rounded-[2rem] border border-slate-100 shadow-sm flex items-center justify-between gap-3 group hover:shadow-2xl hover:shadow-slate-200/40 hover:-translate-y-1 transition-all duration-500">
                <div class="flex items-center gap-3 sm:gap-5 min-w-0">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center transition-all group-hover:rotate-6 group-hover:scale-110 duration-500 shadow-sm flex-shrink-0" style="background: {{ $skill->color }}10; border: 1.5px solid {{ $skill->color }}20; color: {{ $skill->color }};">
                        @if($skill->icon_path)
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $skill->icon_path }}"/></svg>
                        @else
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <h4 class="font-black text-slate-900 text-sm sm:text-base tracking-tight leading-none mb-1.5 group-hover:text-primary-600 transition-colors truncate">{{ $skill->name }}</h4>
                        <div class="flex items-center gap-2">
                            <span class="text-[0.55rem] font-bold text-slate-300 uppercase tracking-widest bg-slate-50 px-2 py-0.5 rounded border border-slate-100">Order: {{ $skill->sort_order }}</span>
                            <div class="w-2 h-2 rounded-full" style="background: {{ $skill->color }};"></div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-1 opacity-100 md:opacity-0 md:group-hover:opacity-100 translate-x-0 md:translate-x-2 md:group-hover:translate-x-0 transition-all">
                    <button wire:click="edit({{ $skill->id }})" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all shadow-sm flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </button>
                    <button onclick="confirm('Hapus skill ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $skill->id }})" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all shadow-sm flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" x-trap.noscroll="open" @keydown.escape.window="open = false" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-start sm:items-center justify-center min-h-screen p-4 py-6 sm:py-8">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-3xl sm:rounded-[3.5rem] w-full max-w-2xl shadow-2xl overflow-hidden border border-slate-100">
                {{-- Modal Header --}}
                <div class="px-6 sm:px-12 py-8 sm:py-10 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-primary-600"></div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">{{ $isEditing ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Skill</span></h3>
                        <p class="text-[0.7rem] text-slate-400 font-bold uppercase tracking-widest mt-1">Kelola keahlian teknis Anda</p>
                    </div>
                    <button @click="open = false" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white text-slate-400 hover:bg-rose-50 hover:text-rose-500 transition-all border border-slate-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="px-6 sm:px-12 py-8 sm:py-12 max-h-[75vh] sm:max-h-[80vh] overflow-y-auto custom-scrollbar">
                    <form wire:submit.prevent="save" class="space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Skill</label>
                                <input type="text" wire:model="name" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Contoh: Mikrotik RouterOS">
                                @error('name') <span class="text-rose-500 text-[0.65rem] font-bold px-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Kategori</label>
                                <div class="relative">
                                    <input type="text" wire:model="category" list="categories" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Pilih atau Ketik Kategori">
                                    <datalist id="categories">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                @error('category') <span class="text-rose-500 text-[0.65rem] font-bold px-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Warna Aksen</label>
                                <div class="flex gap-4 items-center">
                                    <div class="w-14 h-14 rounded-2xl border border-slate-100 flex-shrink-0 flex items-center justify-center bg-slate-50 overflow-hidden relative group/color">
                                        <input type="color" wire:model="color" class="absolute inset-0 w-full h-full scale-150 cursor-pointer border-none p-0 opacity-0">
                                        <div class="w-8 h-8 rounded-full shadow-inner" style="background: {{ $color }}"></div>
                                    </div>
                                    <input type="text" wire:model="color" class="flex-1 bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none uppercase">
                                </div>
                                @error('color') <span class="text-rose-500 text-[0.65rem] font-bold px-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Urutan (Sort Order)</label>
                                <input type="number" wire:model="sort_order" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none">
                                @error('sort_order') <span class="text-rose-500 text-[0.65rem] font-bold px-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">SVG Icon Path (Opsional)</label>
                            <textarea wire:model="icon_path" rows="4" class="w-full bg-slate-50 border border-slate-100 rounded-3xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none leading-relaxed" placeholder="Contoh: M12 4v16m8-8H4..."></textarea>
                            <p class="text-[0.6rem] text-slate-300 font-bold px-2 italic">Hanya isi bagian 'd' pada tag &lt;path&gt; atau SVG lengkap.</p>
                        </div>

                        <div class="pt-10 flex items-center gap-6">
                            <button type="button" @click="open = false" class="admin-btn-secondary border-slate-200 rounded-[2.5rem]">
                                Batal
                            </button>
                            <button type="submit" class="admin-btn-submit rounded-[2.5rem]">
                                <div wire:loading wire:target="save">
                                    <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                </div>
                                <span>{{ $isEditing ? 'Simpan Perubahan' : 'Tambah Skill' }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
