<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Experience;

class ExperienceManager extends Component
{
    public $experiences;
    public $title, $company, $period, $description, $responsibilities = [], $dot_color, $badge_type, $is_current, $is_leadership, $sort_order;
    public $experienceId;
    public $isEditing = false;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'period' => 'required|string|max:255',
        'description' => 'nullable|string',
        'responsibilities' => 'nullable|array',
        'dot_color' => 'required|string',
        'badge_type' => 'required|in:filled,outline',
        'is_current' => 'boolean',
        'is_leadership' => 'boolean',
        'sort_order' => 'required|integer',
    ];

    public function mount()
    {
        $this->loadExperiences();
        $this->resetFields();
    }

    public function loadExperiences()
    {
        $this->experiences = Experience::orderBy('sort_order')->get();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->company = '';
        $this->period = '';
        $this->description = '';
        $this->responsibilities = [];
        $this->dot_color = '#0d9488';
        $this->badge_type = 'outline';
        $this->is_current = false;
        $this->is_leadership = false;
        $this->sort_order = Experience::max('sort_order') + 1;
        $this->experienceId = null;
        $this->isEditing = false;
    }

    public function openModal()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->experienceId = $experience->id;
        $this->title = $experience->title;
        $this->company = $experience->company;
        $this->period = $experience->period;
        $this->description = $experience->description;
        $this->responsibilities = $experience->responsibilities ?? [];
        $this->dot_color = $experience->dot_color;
        $this->badge_type = $experience->badge_type;
        $this->is_current = (bool)$experience->is_current;
        $this->is_leadership = (bool)$experience->is_leadership;
        $this->sort_order = $experience->sort_order;
        
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'company' => $this->company,
            'period' => $this->period,
            'description' => $this->description,
            'responsibilities' => $this->responsibilities,
            'dot_color' => $this->dot_color,
            'badge_type' => $this->badge_type,
            'is_current' => $this->is_current,
            'is_leadership' => $this->is_leadership,
            'sort_order' => $this->sort_order,
        ];

        if ($this->isEditing) {
            Experience::find($this->experienceId)->update($data);
        } else {
            Experience::create($data);
        }

        $this->loadExperiences();
        $this->showModal = false;
        $this->resetFields();
        
        session()->flash('message', $this->isEditing ? 'Pengalaman diperbarui!' : 'Pengalaman ditambahkan!');
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        $this->loadExperiences();
        session()->flash('message', 'Pengalaman dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.experience-manager');
    }
}
