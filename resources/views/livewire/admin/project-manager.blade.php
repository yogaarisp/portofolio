<div class="space-y-10">
    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
        <div class="flex items-start gap-4">
            <div class="w-11 h-11 rounded-2xl bg-primary-50 text-primary-600 border border-primary-100 shadow-sm flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7zm4 3h8m-8 4h5"/></svg>
            </div>
            <div>
                <p class="text-[0.62rem] font-black text-primary-600 uppercase tracking-[0.22em]">Admin Workspace</p>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mt-1">Manajemen <span class="text-primary-600">Proyek</span></h2>
                <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola portofolio karya terbaik Anda di sini.</p>
            </div>
        </div>
        <button wire:click="openModal" class="admin-btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Proyek
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 animate-fade-in-down">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-8">
        @foreach($this->projects as $project)
        <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
            <div class="h-48 relative overflow-hidden" style="background: {{ $project->gradient }}">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="absolute top-6 right-6">
                    <span class="px-4 py-2 rounded-xl text-[0.6rem] font-black uppercase tracking-widest {{ $project->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-slate-800 text-slate-300' }}">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
            <div class="p-5 sm:p-8 flex-1 flex flex-col">
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->tags ?? [] as $tag)
                    <span class="text-[0.6rem] font-black px-3 py-1.5 rounded-lg bg-slate-50 text-slate-500 uppercase tracking-widest border border-slate-100">{{ $tag }}</span>
                    @endforeach
                </div>
                <h3 class="text-lg sm:text-xl font-black text-slate-900 uppercase tracking-tight mb-3 group-hover:text-primary-600 transition-colors">{{ $project->name }}</h3>
                <p class="text-slate-400 text-sm font-medium leading-relaxed mb-8 flex-1 line-clamp-3">{{ $project->description }}</p>
                
                <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-[0.65rem] font-black text-slate-300 uppercase tracking-widest">Order: {{ $project->sort_order }}</span>
                    <div class="flex items-center gap-2">
                        <button wire:click="edit({{ $project->id }})" class="p-3 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </button>
                        <button onclick="confirm('Hapus proyek ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $project->id }})" class="p-3 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }" x-effect="document.body.classList.toggle('overflow-hidden', open)" x-show="open" @keydown.escape.window="open = false" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-start sm:items-center justify-center min-h-screen p-4 py-6 sm:py-8">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-2xl sm:rounded-[3rem] w-full max-w-3xl shadow-2xl overflow-hidden border border-slate-100">
                {{-- Modal Header --}}
                <div class="px-5 sm:px-10 py-5 sm:py-7 bg-gradient-to-r from-slate-50 via-white to-slate-50 border-b border-slate-100 flex items-start sm:items-center justify-between gap-4 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-primary-500 to-primary-700"></div>
                    <div class="flex items-start gap-3 sm:gap-4 pl-2">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center border border-primary-100 shadow-sm flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7zm4 3h8m-8 4h5"/></svg>
                        </div>
                        <div class="pt-0.5">
                            <p class="text-[0.62rem] font-black text-primary-600 uppercase tracking-[0.22em]">{{ $isEditing ? 'Mode Edit' : 'Form Baru' }}</p>
                            <h3 class="text-lg sm:text-xl font-black text-slate-900 tracking-tight leading-tight mt-1">{{ $isEditing ? 'Edit Proyek' : 'Tambah Proyek' }}</h3>
                            <p class="text-[0.68rem] sm:text-[0.7rem] text-slate-400 font-bold uppercase tracking-[0.16em] mt-1">Detail informasi portofolio Anda</p>
                        </div>
                    </div>
                    <button type="button" @click="open = false" class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all border border-slate-200 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="px-5 sm:px-10 py-6 sm:py-10 max-h-[75vh] sm:max-h-[80vh] overflow-y-auto custom-scrollbar">
                    <form wire:submit.prevent="save" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                            <div class="md:col-span-8 space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Proyek</label>
                                <input type="text" wire:model="name" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Contoh: IT Asset Management">
                                @error('name') <span class="text-rose-500 text-[0.65rem] font-bold uppercase">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:col-span-4 space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Status</label>
                                <select wire:model="status" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none">
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Deskripsi Singkat</label>
                            <textarea wire:model="description" rows="4" class="w-full bg-slate-50 border border-slate-100 rounded-3xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none leading-relaxed" placeholder="Jelaskan proyek Anda secara ringkas namun informatif..."></textarea>
                        </div>

                        <div class="space-y-3" x-data="{ tag: '' }">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Teknologi & Stack (Tags)</label>
                            <div class="flex flex-wrap gap-2 p-4 bg-slate-50 border border-slate-100 rounded-3xl min-h-[80px] focus-within:bg-white focus-within:border-primary-500 transition-all">
                                @foreach($tags as $index => $t)
                                <span class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-[0.65rem] font-black uppercase flex items-center gap-3 shadow-sm transition-all hover:border-rose-200 group/tag">
                                    {{ $t }}
                                    <button type="button" wire:click="$set('tags', {{ json_encode(array_values(array_filter($tags, function($k) use ($index) { return $k != $index; }, ARRAY_FILTER_USE_KEY))) }})" class="text-slate-300 group-hover/tag:text-rose-500 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </span>
                                @endforeach
                                <input type="text" x-model="tag" @keydown.enter.prevent="if(tag.trim() != '') { $wire.set('tags', [...$wire.get('tags'), tag]); tag = ''; }" class="bg-transparent border-none focus:ring-0 text-sm font-bold text-slate-700 placeholder-slate-300 flex-1 min-w-[150px]" placeholder="Ketik teknologi lalu Enter...">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Warna Aksen (Gradient)</label>
                                <div class="flex gap-4">
                                    <input type="text" wire:model="gradient" class="flex-1 bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none">
                                    <div class="w-14 h-14 rounded-2xl border border-slate-100 shadow-inner" style="background: {{ $gradient }}"></div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">URL / Tautan Luar</label>
                                <input type="text" wire:model="url" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="https://github.com/...">
                            </div>
                        </div>

                        <div class="pt-10 flex items-center gap-4">
                            <button type="button" @click="open = false" class="admin-btn-secondary">
                                Batal
                            </button>
                            <button type="submit" class="admin-btn-submit">
                                <svg wire:loading wire:target="save" class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                {{ $isEditing ? 'Simpan Perubahan' : 'Publikasikan Proyek' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
