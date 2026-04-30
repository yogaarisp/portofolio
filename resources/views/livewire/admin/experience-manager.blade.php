<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Riwayat <span class="text-primary-600">Karir</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola linimasa pengalaman profesional Anda.</p>
        </div>
        <button wire:click="openModal" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Pengalaman
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 animate-fade-in-down">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Posisi & Perusahaan</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Periode</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($experiences as $exp)
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full flex-shrink-0" style="background: {{ $exp->dot_color }}; box-shadow: 0 0 0 4px {{ $exp->dot_color }}20;"></div>
                                <div>
                                    <p class="font-black text-slate-900 text-sm tracking-tight leading-none mb-1 group-hover:text-primary-600 transition-colors">{{ $exp->title }}</p>
                                    <p class="text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest">{{ $exp->company }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $exp->period }}</span>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-3">
                                @if($exp->is_current)
                                <span class="bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-lg text-[0.6rem] font-black uppercase tracking-widest">Sekarang</span>
                                @endif
                                @if($exp->is_leadership)
                                <span class="bg-rose-50 text-rose-600 px-3 py-1.5 rounded-lg text-[0.6rem] font-black uppercase tracking-widest">Leadership</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-2">
                                <button wire:click="edit({{ $exp->id }})" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </button>
                                <button onclick="confirm('Hapus riwayat ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $exp->id }})" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-[3rem] w-full max-w-2xl shadow-2xl overflow-hidden">
                <div class="px-10 py-12">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">{{ $isEditing ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Pengalaman</span></h3>
                        <button @click="open = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="save" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Posisi</label>
                                <input type="text" wire:model="title" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Contoh: Senior IT Support">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Perusahaan</label>
                                <input type="text" wire:model="company" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Contoh: Google Indonesia">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Periode Waktu</label>
                                <input type="text" wire:model="period" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Contoh: 2022 - Sekarang">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Warna Dot Timeline</label>
                                <div class="flex gap-4 items-center">
                                    <input type="color" wire:model="dot_color" class="w-12 h-12 rounded-xl border-none p-0 cursor-pointer overflow-hidden">
                                    <input type="text" wire:model="dot_color" class="flex-1 bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-8">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" wire:model="is_current" class="w-6 h-6 rounded-lg border-slate-200 text-primary-600 focus:ring-primary-500/20">
                                <span class="text-[0.7rem] font-black text-slate-600 uppercase tracking-widest">Pekerjaan Saat Ini</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" wire:model="is_leadership" class="w-6 h-6 rounded-lg border-slate-200 text-rose-600 focus:ring-rose-500/20">
                                <span class="text-[0.7rem] font-black text-slate-600 uppercase tracking-widest">Posisi Leadership</span>
                            </label>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Deskripsi Singkat</label>
                            <textarea wire:model="description" rows="3" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none" placeholder="Ringkasan tugas utama..."></textarea>
                        </div>

                        <div class="space-y-3" x-data="{ responsibility: '' }">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Poin Tanggung Jawab (Key Responsibilities)</label>
                            <div class="space-y-3">
                                @foreach($responsibilities as $index => $r)
                                <div class="flex items-center gap-3">
                                    <input type="text" wire:model="responsibilities.{{ $index }}" class="flex-1 bg-slate-50 border-slate-100 rounded-2xl px-6 py-3 text-sm font-bold text-slate-700 outline-none">
                                    <button type="button" wire:click="$set('responsibilities', {{ json_encode(array_values(array_filter($responsibilities, function($k) use ($index) { return $k != $index; }, ARRAY_FILTER_USE_KEY))) }})" class="p-3 rounded-xl bg-slate-50 text-slate-300 hover:text-rose-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                                @endforeach
                                <div class="flex items-center gap-3">
                                    <input type="text" x-model="responsibility" @keydown.enter.prevent="if(responsibility.trim() != '') { $wire.set('responsibilities', [...$wire.get('responsibilities'), responsibility]); responsibility = ''; }" class="flex-1 bg-slate-50 border-slate-100 border-dashed rounded-2xl px-6 py-3 text-sm font-bold text-slate-400 placeholder-slate-300 outline-none" placeholder="Tambah poin baru (Enter)...">
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-primary-600 text-white py-5 rounded-[2rem] font-black text-xs uppercase tracking-[0.3em] hover:bg-primary-700 transition-all shadow-2xl shadow-primary-600/30">
                                {{ $isEditing ? 'Simpan Perubahan' : 'Tambah Riwayat Karir' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
