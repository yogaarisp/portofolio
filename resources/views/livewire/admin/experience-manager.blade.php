<div class="space-y-10">
    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
        <div class="flex items-start gap-4">
            <div class="w-11 h-11 rounded-2xl bg-primary-50 text-primary-600 border border-primary-100 shadow-sm flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 8h10M7 12h6m-6 4h10M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H9l-4 4v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-[0.62rem] font-black text-primary-600 uppercase tracking-[0.22em]">Admin Workspace</p>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mt-1">Riwayat <span class="text-primary-600">Karir</span></h2>
                <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola linimasa pengalaman profesional Anda.</p>
            </div>
        </div>
        <button wire:click="openModal" class="admin-btn-primary">
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

    <div class="hidden md:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
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

    <div class="md:hidden space-y-4">
        @foreach($experiences as $exp)
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-5 space-y-4">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full flex-shrink-0" style="background: {{ $exp->dot_color }}; box-shadow: 0 0 0 4px {{ $exp->dot_color }}20;"></div>
                            <p class="font-black text-slate-900 text-sm tracking-tight truncate">{{ $exp->title }}</p>
                        </div>
                        <p class="mt-2 text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest">{{ $exp->company }}</p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <button wire:click="edit({{ $exp->id }})" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </button>
                        <button onclick="confirm('Hapus riwayat ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $exp->id }})" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $exp->period }}</p>
                <div class="flex items-center gap-2 flex-wrap">
                    @if($exp->is_current)
                        <span class="bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-lg text-[0.6rem] font-black uppercase tracking-widest">Sekarang</span>
                    @endif
                    @if($exp->is_leadership)
                        <span class="bg-rose-50 text-rose-600 px-3 py-1.5 rounded-lg text-[0.6rem] font-black uppercase tracking-widest">Leadership</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" x-trap.noscroll="open" @keydown.escape.window="open = false" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div class="flex items-start sm:items-center justify-center min-h-screen p-4 py-6 sm:py-8">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md" @click="open = false"></div>
            
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative bg-white rounded-2xl sm:rounded-[3rem] w-full max-w-3xl shadow-2xl overflow-hidden border border-slate-100">
                {{-- Modal Header --}}
                <div class="px-5 sm:px-10 py-6 sm:py-8 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-primary-600"></div>
                    <div>
                        <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">{{ $isEditing ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Pengalaman</span></h3>
                        <p class="text-[0.65rem] text-slate-400 font-bold uppercase tracking-widest mt-1">Kelola riwayat karir profesional Anda</p>
                    </div>
                    <button @click="open = false" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-400 hover:bg-rose-50 hover:text-rose-500 transition-all border border-slate-100 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="px-5 sm:px-10 py-6 sm:py-10 max-h-[75vh] sm:max-h-[80vh] overflow-y-auto custom-scrollbar">
                    <form wire:submit.prevent="save" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Posisi</label>
                                <input type="text" wire:model="title" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Contoh: Senior IT Support">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Perusahaan</label>
                                <input type="text" wire:model="company" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Contoh: Google Indonesia">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Periode Waktu</label>
                                <input type="text" wire:model="period" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none" placeholder="Contoh: 2022 - Sekarang">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Warna Dot Timeline</label>
                                <div class="flex gap-4 items-center">
                                    <div class="w-14 h-14 rounded-2xl border border-slate-100 flex-shrink-0 flex items-center justify-center bg-slate-50 overflow-hidden relative group/color">
                                        <input type="color" wire:model="dot_color" class="absolute inset-0 w-full h-full scale-150 cursor-pointer border-none p-0 opacity-0">
                                        <div class="w-8 h-8 rounded-full shadow-inner" style="background: {{ $dot_color }}"></div>
                                    </div>
                                    <input type="text" wire:model="dot_color" class="flex-1 bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-[0.7rem] font-mono font-bold text-slate-600 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none uppercase">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-10 py-2">
                            <label class="flex items-center gap-4 cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" wire:model="is_current" class="sr-only peer">
                                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-500/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                </div>
                                <span class="text-[0.7rem] font-black text-slate-600 uppercase tracking-widest">Pekerjaan Saat Ini</span>
                            </label>
                            <label class="flex items-center gap-4 cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" wire:model="is_leadership" class="sr-only peer">
                                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-rose-500/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-rose-500"></div>
                                </div>
                                <span class="text-[0.7rem] font-black text-slate-600 uppercase tracking-widest">Posisi Leadership</span>
                            </label>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Ringkasan Peran</label>
                            <textarea wire:model="description" rows="3" class="w-full bg-slate-50 border border-slate-100 rounded-3xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 focus:bg-white transition-all outline-none leading-relaxed" placeholder="Gambarkan tanggung jawab utama Anda secara singkat..."></textarea>
                        </div>

                        <div class="space-y-4" x-data="{ responsibility: '' }">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Poin Tanggung Jawab (Key Responsibilities)</label>
                            <div class="space-y-3">
                                @foreach($responsibilities as $index => $r)
                                <div class="flex items-center gap-3 animate-fade-in group/row">
                                    <div class="w-10 h-10 rounded-xl bg-slate-50 text-slate-300 flex items-center justify-center font-bold text-xs">{{ $index + 1 }}</div>
                                    <input type="text" wire:model="responsibilities.{{ $index }}" class="flex-1 bg-white border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none focus:border-primary-500 transition-all shadow-sm">
                                    <button type="button" wire:click="$set('responsibilities', {{ json_encode(array_values(array_filter($responsibilities, function($k) use ($index) { return $k != $index; }, ARRAY_FILTER_USE_KEY))) }})" class="p-4 rounded-xl text-slate-300 hover:bg-rose-50 hover:text-rose-500 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                                @endforeach
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary-600 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                                    </div>
                                    <input type="text" x-model="responsibility" @keydown.enter.prevent="if(responsibility.trim() != '') { $wire.set('responsibilities', [...$wire.get('responsibilities'), responsibility]); responsibility = ''; }" class="flex-1 bg-slate-50 border border-slate-100 border-dashed rounded-2xl px-6 py-4 text-sm font-bold text-slate-400 placeholder-slate-300 outline-none focus:border-primary-500 focus:bg-white transition-all" placeholder="Tambah poin tanggung jawab baru (Tekan Enter)...">
                                </div>
                            </div>
                        </div>

                        <div class="pt-10 flex items-center gap-4">
                            <button type="button" @click="open = false" class="admin-btn-secondary">
                                Batal
                            </button>
                            <button type="submit" class="admin-btn-submit">
                                <svg wire:loading wire:target="save" class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                {{ $isEditing ? 'Simpan Perubahan' : 'Tambah Riwayat Karir' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
