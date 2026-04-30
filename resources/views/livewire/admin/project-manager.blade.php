<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Manajemen <span class="text-primary-600">Proyek</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola portofolio karya terbaik Anda di sini.</p>
        </div>
        <button wire:click="openModal" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
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

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
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
            <div class="p-8 flex-1 flex flex-col">
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->tags ?? [] as $tag)
                    <span class="text-[0.6rem] font-black px-3 py-1.5 rounded-lg bg-slate-50 text-slate-500 uppercase tracking-widest border border-slate-100">{{ $tag }}</span>
                    @endforeach
                </div>
                <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight mb-3 group-hover:text-primary-600 transition-colors">{{ $project->name }}</h3>
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
    <div x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-[3rem] w-full max-w-2xl shadow-2xl overflow-hidden">
                <div class="px-10 py-12">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">{{ $isEditing ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Proyek</span></h3>
                        <button @click="open = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="save" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Proyek</label>
                                <input type="text" wire:model="name" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Contoh: IT Asset Management">
                                @error('name') <span class="text-rose-500 text-[0.65rem] font-bold uppercase">{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Status</label>
                                <select wire:model="status" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Deskripsi Singkat</label>
                            <textarea wire:model="description" rows="3" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Jelaskan proyek Anda..."></textarea>
                        </div>

                        <div class="space-y-3" x-data="{ tag: '' }">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Teknologi (Tags)</label>
                            <div class="flex flex-wrap gap-2 p-3 bg-slate-50 border border-slate-100 rounded-2xl min-h-[60px]">
                                @foreach($tags as $index => $t)
                                <span class="bg-white border border-slate-200 text-slate-600 px-3 py-1.5 rounded-xl text-[0.65rem] font-black uppercase flex items-center gap-2">
                                    {{ $t }}
                                    <button type="button" wire:click="$set('tags', {{ json_encode(array_values(array_filter($tags, function($k) use ($index) { return $k != $index; }, ARRAY_FILTER_USE_KEY))) }})" class="text-slate-400 hover:text-rose-500 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </span>
                                @endforeach
                                <input type="text" x-model="tag" @keydown.enter.prevent="if(tag.trim() != '') { $wire.set('tags', [...$wire.get('tags'), tag]); tag = ''; }" class="bg-transparent border-none focus:ring-0 text-sm font-bold text-slate-700 placeholder-slate-300 flex-1" placeholder="Ketik lalu Enter...">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">CSS Gradient Background</label>
                                <input type="text" wire:model="gradient" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">URL / Link Proyek</label>
                                <input type="text" wire:model="url" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="https://...">
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-primary-600 text-white py-5 rounded-[2rem] font-black text-xs uppercase tracking-[0.3em] hover:bg-primary-700 transition-all shadow-2xl shadow-primary-600/30">
                                {{ $isEditing ? 'Simpan Perubahan' : 'Publikasikan Proyek' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
