<?php

use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $projects;
    public $name, $description, $category, $client, $tags, $url, $date_info, $status = 'draft';
    public $projectId;
    public $isModalOpen = false;
    public $search = '';

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->get();
    }

    public function updatedSearch()
    {
        $this->loadProjects();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
        $this->resetInputFields();
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->category = '';
        $this->client = '';
        $this->tags = '';
        $this->url = '';
        $this->date_info = '';
        $this->status = 'draft';
        $this->projectId = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        Project::updateOrCreate(['id' => $this->projectId], [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'client' => $this->client,
            'tags' => $this->tags,
            'url' => $this->url,
            'date_info' => $this->date_info,
            'status' => $this->status,
        ]);

        $this->loadProjects();
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->projectId = $id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->category = $project->category;
        $this->client = $project->client;
        $this->tags = $project->tags;
        $this->url = $project->url;
        $this->date_info = $project->date_info;
        $this->status = $project->status;

        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        Project::find($id)->delete();
        $this->loadProjects();
    }
};
?>

<div class="space-y-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Manajemen <span class="text-primary-600">Proyek</span></h2>
            <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Daftar seluruh karya dan proyek teknis Anda.</p>
        </div>
        <button wire:click="openModal" class="bg-primary-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20 flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Proyek Baru
        </button>
    </div>

    <!-- Search Bar -->
    <div class="relative group max-w-md">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
        <input type="text" wire:model.live="search" placeholder="Cari nama proyek..." class="bg-white border-slate-100 rounded-2xl pl-12 pr-6 py-4 text-sm font-bold w-full focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none shadow-sm">
    </div>

    <!-- Project Table Card -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden min-h-[400px]">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Thumbnail & Nama</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-10 py-6 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($projects as $p)
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-5">
                                <div class="w-16 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-black text-slate-900 text-sm group-hover:text-primary-600 transition-colors">{{ $p->name }}</p>
                                    <p class="text-[0.65rem] font-bold text-slate-400 mt-1 uppercase tracking-widest">ID: PRJ-{{ str_pad($p->id, 3, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-7">
                            <span class="text-[0.65rem] font-black px-3 py-1.5 rounded-lg bg-primary-50 text-primary-600 uppercase tracking-widest border border-primary-100">{{ $p->category }}</span>
                        </td>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full {{ $p->status == 'published' ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                <span class="text-[0.65rem] font-black text-slate-700 uppercase tracking-widest">{{ $p->status }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-2">
                                <button wire:click="edit({{ $p->id }})" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </button>
                                <button onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()" wire:click="delete({{ $p->id }})" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-10 py-20 text-center">
                            <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Belum ada proyek ditemukan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form -->
    @if($isModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" wire:click="closeModal"></div>
        <div class="bg-white rounded-[2.5rem] w-full max-w-2xl relative z-10 shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="px-10 py-8 border-b border-slate-50 flex items-center justify-between">
                <h3 class="font-black text-slate-900 text-xl tracking-tight uppercase">{{ $projectId ? 'Edit' : 'Tambah' }} <span class="text-primary-600">Proyek</span></h3>
                <button wire:click="closeModal" class="text-slate-400 hover:text-slate-900 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <form wire:submit.prevent="store" class="p-10 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Nama Proyek</label>
                        <input type="text" wire:model="name" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                        @error('name') <span class="text-rose-500 text-[0.65rem] font-bold uppercase px-1">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Kategori</label>
                        <select wire:model="category" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none appearance-none">
                            <option value="">Pilih Kategori</option>
                            <option value="Web App">Web App</option>
                            <option value="Networking">Networking</option>
                            <option value="Infrastructure">Infrastructure</option>
                            <option value="CCTV">CCTV</option>
                        </select>
                        @error('category') <span class="text-rose-500 text-[0.65rem] font-bold uppercase px-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Client</label>
                        <input type="text" wire:model="client" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Tags (Koma pisah)</label>
                        <input type="text" wire:model="tags" placeholder="e.g. Laravel, Cisco" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Deskripsi</label>
                    <textarea wire:model="description" rows="3" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">URL Proyek</label>
                        <input type="text" wire:model="url" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">Status</label>
                        <select wire:model="status" class="w-full bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none appearance-none">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                </div>

                <div class="pt-6 flex justify-end gap-4">
                    <button type="button" wire:click="closeModal" class="bg-slate-50 text-slate-600 px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-slate-100 transition-all">Batal</button>
                    <button type="submit" class="bg-primary-600 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-700 transition-all shadow-xl shadow-primary-600/20">Simpan Proyek</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>