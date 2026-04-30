<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Daftar <span class="text-primary-600">Skills</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola keahlian teknis dan kategori Anda.</p>
        </div>
        <button wire:click="openModal" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
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

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        @php $currentCategory = ''; @endphp
        @foreach($skills as $skill)
            @if($currentCategory !== $skill->category)
                @php $currentCategory = $skill->category; @endphp
                <div class="col-span-1 md:col-span-2 xl:col-span-3 pt-6 first:pt-0">
                    <h4 class="text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.3em] flex items-center gap-4">
                        {{ $skill->category }}
                        <div class="h-px bg-slate-100 flex-1"></div>
                    </h4>
                </div>
            @endif
            
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center justify-between group hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110 duration-500" style="background: {{ $skill->color }}15; color: {{ $skill->color }};">
                        @if($skill->icon_path)
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $skill->icon_path !!}</svg>
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        @endif
                    </div>
                    <div>
                        <p class="font-black text-slate-900 text-sm tracking-tight leading-none mb-1 group-hover:text-primary-600 transition-colors">{{ $skill->name }}</p>
                        <p class="text-[0.6rem] font-bold text-slate-300 uppercase tracking-widest">Order: {{ $skill->sort_order }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button wire:click="edit({{ $skill->id }})" class="p-2 rounded-lg bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </button>
                    <button onclick="confirm('Hapus skill ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $skill->id }})" class="p-2 rounded-lg bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-[3rem] w-full max-w-xl shadow-2xl overflow-hidden">
                <div class="px-10 py-12">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">{{ $isEditing ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Skill</span></h3>
                        <button @click="open = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="save" class="space-y-8">
                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Skill</label>
                            <input type="text" wire:model="name" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Contoh: Mikrotik RouterOS">
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Kategori</label>
                            <select wire:model="category" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                <option value="Hardware & Troubleshooting">Hardware & Troubleshooting</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Network Infrastructure">Network Infrastructure</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Warna Aksen</label>
                                <div class="flex gap-4 items-center">
                                    <input type="color" wire:model="color" class="w-12 h-12 rounded-xl border-none p-0 cursor-pointer overflow-hidden">
                                    <input type="text" wire:model="color" class="flex-1 bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Urutan</label>
                                <input type="number" wire:model="sort_order" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">SVG Icon Path (Optional)</label>
                            <textarea wire:model="icon_path" rows="4" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Isi dengan isi tag <path> saja..."></textarea>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-primary-600 text-white py-5 rounded-[2rem] font-black text-xs uppercase tracking-[0.3em] hover:bg-primary-700 transition-all shadow-2xl shadow-primary-600/30">
                                {{ $isEditing ? 'Simpan Perubahan' : 'Tambah Skill' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
