<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Experience;
use Livewire\Attributes\Computed;

class ExperienceManager extends Component
{
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
        $this->resetFields();
    }

    #[Computed]
    public function experiences()
    {
        return Experience::orderBy('sort_order')->get();
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
        $this->resetValidation();
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

        Experience::updateOrCreate(['id' => $this->experienceId], $data);

        $this->showModal = false;
        $this->resetFields();
        
        session()->flash('message', $this->isEditing ? 'Pengalaman diperbarui!' : 'Pengalaman ditambahkan!');
    }

    public function delete($id)
    {
        Experience::findOrFail($id)->delete();
        session()->flash('message', 'Pengalaman dihapus!');
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Experience::where('id', $item['value'])->update(['sort_order' => $item['order']]);
        }
        session()->flash('message', 'Urutan berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.admin.experience-manager');
    }
}
