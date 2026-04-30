<?php

use Livewire\Component;
use App\Models\Setting;

new class extends Component
{
    public $settings = [];
    public $newKey, $newValue;

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $this->settings = Setting::all()->pluck('value', 'key')->toArray();
    }

    public function save($key)
    {
        Setting::updateOrCreate(['key' => $key], ['value' => $this->settings[$key]]);
        session()->flash('message', 'Pengaturan berhasil disimpan!');
    }

    public function addSetting()
    {
        $this->validate([
            'newKey' => 'required|unique:settings,key',
            'newValue' => 'required',
        ]);

        Setting::create(['key' => $this->newKey, 'value' => $this->newValue]);
        $this->loadSettings();
        $this->newKey = '';
        $this->newValue = '';
    }

    public function delete($key)
    {
        Setting::where('key', $key)->delete();
        $this->loadSettings();
    }
};
?>

<div class="space-y-12">
    <!-- Header -->
    <div>
        <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight uppercase">Pengaturan <span class="text-primary-600">Sistem</span></h2>
        <p class="text-slate-400 font-bold text-sm mt-2 tracking-wide">Konfigurasi profil publik dan informasi portfolio Anda.</p>
    </div>

    @if (session()->has('message'))
        <div class="bg-emerald-50 text-emerald-600 p-4 rounded-2xl font-bold text-sm uppercase tracking-widest border border-emerald-100 animate-bounce">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-10">
                <h3 class="font-black text-slate-900 text-lg uppercase tracking-tight mb-8">Informasi <span class="text-primary-600">Umum</span></h3>
                <div class="space-y-6">
                    @foreach($settings as $key => $value)
                    <div class="space-y-2 group">
                        <div class="flex justify-between items-center">
                            <label class="text-[0.65rem] font-black text-slate-400 uppercase tracking-widest px-1">{{ str_replace('_', ' ', $key) }}</label>
                            <button wire:click="delete('{{ $key }}')" class="opacity-0 group-hover:opacity-100 text-rose-500 hover:text-rose-700 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        <div class="flex gap-4">
                            <input type="text" wire:model="settings.{{ $key }}" class="flex-1 bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                            <button wire:click="save('{{ $key }}')" class="bg-primary-600 text-white px-6 rounded-2xl font-black text-[0.65rem] uppercase tracking-widest hover:bg-primary-700 transition-all shadow-lg shadow-primary-600/20">Simpan</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Add New Setting -->
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-10">
                <h3 class="font-black text-slate-900 text-lg uppercase tracking-tight mb-8">Tambah <span class="text-primary-600">Pengaturan Baru</span></h3>
                <form wire:submit.prevent="addSetting" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" wire:model="newKey" placeholder="Key (e.g. facebook_url)" class="bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 outline-none focus:ring-2 focus:ring-primary-500/20">
                        <input type="text" wire:model="newValue" placeholder="Value" class="bg-slate-50 border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-800 outline-none focus:ring-2 focus:ring-primary-500/20">
                    </div>
                    @error('newKey') <p class="text-rose-500 text-[0.65rem] font-bold uppercase">{{ $message }}</p> @enderror
                    <button type="submit" class="w-full py-4 rounded-2xl border-2 border-dashed border-primary-200 text-primary-600 font-black text-xs uppercase tracking-[0.2em] hover:bg-primary-50 transition-all">Tambah Konfigurasi</button>
                </form>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-10">
            <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden group">
                <h3 class="font-black text-lg uppercase tracking-tight mb-4 text-primary-400">Pusat Bantuan</h3>
                <p class="text-slate-400 text-sm font-bold leading-relaxed mb-8">Gunakan "Key" yang unik untuk setiap pengaturan. Data ini akan muncul di landing page Anda.</p>
                <div class="w-16 h-1 bg-primary-500 rounded-full"></div>
            </div>
        </div>
    </div>
</div>