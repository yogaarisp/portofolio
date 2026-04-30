<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;

class SettingManager extends Component
{
    use WithFileUploads;

    public $settings = [];
    public $site_name, $contact_email, $linkedin_url, $github_url, $hero_title, $hero_subtitle;
    public $years_experience, $projects_count, $client_satisfaction;
    public $hero_image, $favicon;
    public $hero_image_path, $favicon_path;

    protected $rules = [
        'site_name' => 'required|string|max:255',
        'contact_email' => 'required|email|max:255',
        'linkedin_url' => 'nullable|url',
        'github_url' => 'nullable|url',
        'hero_title' => 'required|string|max:255',
        'hero_subtitle' => 'required|string',
        'years_experience' => 'nullable|string',
        'projects_count' => 'nullable|string',
        'client_satisfaction' => 'nullable|string',
        'hero_image' => 'nullable|image|max:2048',
        'favicon' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $dbSettings = Setting::all()->pluck('value', 'key')->toArray();
        
        $this->site_name = $dbSettings['site_name'] ?? 'Yoga Aris Purwanto';
        $this->contact_email = $dbSettings['contact_email'] ?? 'yoga@example.com';
        $this->linkedin_url = $dbSettings['linkedin_url'] ?? '';
        $this->github_url = $dbSettings['github_url'] ?? '';
        $this->hero_title = $dbSettings['hero_title'] ?? 'Technical Support & System Developer';
        $this->hero_subtitle = $dbSettings['hero_subtitle'] ?? 'Spesialis dalam optimasi infrastruktur IT, manajemen jaringan, dan pengembangan sistem yang efisien.';
        $this->years_experience = $dbSettings['years_experience'] ?? '8+';
        $this->projects_count = $dbSettings['projects_count'] ?? '50+';
        $this->client_satisfaction = $dbSettings['client_satisfaction'] ?? '100%';
        $this->hero_image_path = $dbSettings['hero_image_path'] ?? '';
        $this->favicon_path = $dbSettings['favicon_path'] ?? '';
    }

    public function save()
    {
        $this->validate();

        $data = [
            'site_name' => $this->site_name,
            'contact_email' => $this->contact_email,
            'linkedin_url' => $this->linkedin_url,
            'github_url' => $this->github_url,
            'hero_title' => $this->hero_title,
            'hero_subtitle' => $this->hero_subtitle,
            'years_experience' => $this->years_experience,
            'projects_count' => $this->projects_count,
            'client_satisfaction' => $this->client_satisfaction,
        ];

        if ($this->hero_image) {
            $data['hero_image_path'] = $this->hero_image->store('settings', 'public');
        }

        if ($this->favicon) {
            $data['favicon_path'] = $this->favicon->store('settings', 'public');
        }

        foreach ($data as $key => $value) {
            $setting = Setting::firstOrNew(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        session()->flash('message', 'Pengaturan berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.admin.setting-manager');
    }
}
