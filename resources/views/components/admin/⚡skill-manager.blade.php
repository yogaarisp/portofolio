<?php

use Livewire\Component;
use App\Models\Skill;

new class extends Component
{
    public $skills;
    public $name, $category, $level = 100;
    public $skillId;
    public $isModalOpen = false;

    public function mount()
    {
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = Skill::all()->groupBy('category');
    }

    public function openModal($category = '')
    {
        $this->resetInputFields();
        $this->category = $category;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->category = '';
        $this->level = 100;
        $this->skillId = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'level' => 'required|numeric|min:0|max:100',
        ]);

        Skill::updateOrCreate(['id' => $this->skillId], [
            'name' => $this->name,
            'category' => $this->category,
            'level' => $this->level,
        ]);

        $this->loadSkills();
        $this->closeModal();
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skillId = $id;
        $this->name = $skill->name;
        $this->category = $skill->category;
        $this->level = $skill->level;

        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        Skill::find($id)->delete();
        $this->loadSkills();
    }
};
?>

<div class="space-y-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Manajemen <span class="text-primary-600">Keahlian</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Kelola daftar teknologi dan keahlian yang Anda kuasai.</p>
        </div>
        <button wire:click="openModal" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Skill
        </button>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
            $defaultCategories = ['Hardware', 'Software Dev', 'Networking'];
            $allCats = collect($defaultCategories)->merge($skills->keys())->unique();
        @endphp

        @foreach($allCats as $catName)
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden group min-h-[300px] flex flex-col">
            <div class="p-8 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                <h3 class="font-black text-slate-900 text-lg tracking-tight uppercase">{{ $catName }}</h3>
                <span class="w-8 h-8 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-primary-600 font-black text-xs">{{ isset($skills[$catName]) ? count($skills[$catName]) : 0 }}</span>
            </div>
            <div class="p-8 space-y-4 flex-1">
                @if(isset($skills[$catName]))
                    @foreach($skills[$catName] as $item)
                    <div class="flex items-center justify-between group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-primary-500"></div>
                            <span class="font-bold text-slate-700 text-sm tracking-wide">{{ $item->name }}</span>
                            <span class="text-[0.6rem] font-black text-slate-400 uppercase ml-1">{{ $item->level }}%</span>
                        </div>
                        <div class="flex gap-1 opacity-0 group-hover/item:opacity-100 transition-opacity">
                            <button wire:click="edit({{ $item->id }})" class="p-1.5 text-slate-400 hover:text-blue-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg></button>
                            <button onclick="confirm('Hapus skill ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $item->id }})" class="p-1.5 text-slate-400 hover:text-rose-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-xs font-bold text-slate-300 uppercase tracking-widest text-center py-10">Kosong</p>
                @endif
            </div>
            <div class="p-6 bg-slate-50/50 border-t border-slate-50">
                <button wire:click="openModal('{{ $catName }}')" class="w-full py-3 rounded-xl border-2 border-dashed border-slate-200 text-slate-400 font-black text-[0.65rem] uppercase tracking-[0.2em] hover:bg-white hover:border-primary-200 hover:text-primary-600 transition-all">+ Tambah Item</button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Form -->
    @if($isModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" wire:click="closeModal"></div>
        <div class="bg-white rounded-[2.5rem] w-full max-w-lg relative z-10 shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="px-10 py-8 border-b border-slate-50 flex items-center justify-between">
                <h3 class="font-black text-slate-900 text-xl tracking-tight uppercase">{{ $skillId ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Skill</span></h3>
                <button wire:click="closeModal" class="text-slate-400 hover:text-slate-900 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <form wire:submit.prevent="store" class="p-10 space-y-6">
                <div class="space-y-2">
                    <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Skill</label>
                    <input type="text" wire:model="name" placeholder="e.g. Laravel" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    @error('name') <span class="text-rose-500 text-[0.65rem] font-bold uppercase px-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Kategori</label>
                    <input type="text" wire:model="category" placeholder="e.g. Software Dev" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    @error('category') <span class="text-rose-500 text-[0.65rem] font-bold uppercase px-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between px-1">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest">Level Penguasaan</label>
                        <span class="text-xs font-black text-primary-600">{{ $level }}%</span>
                    </div>
                    <input type="range" wire:model="level" min="0" max="100" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary-600">
                </div>

                <div class="pt-6 flex justify-end gap-4">
                    <button type="button" wire:click="closeModal" class="bg-slate-50 text-slate-600 px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-slate-100 transition-all">Batal</button>
                    <button type="submit" class="bg-primary-600 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20">Simpan Skill</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>