<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;
use Livewire\Attributes\Computed;

class SkillManager extends Component
{
    public $name, $category, $icon_path, $color, $sort_order;
    public $skillId;
    public $isEditing = false;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'icon_path' => 'nullable|string',
        'color' => 'required|string',
        'sort_order' => 'required|integer',
    ];

    public function mount()
    {
        $this->resetFields();
    }

    #[Computed]
    public function skills()
    {
        return Skill::orderBy('category')->orderBy('sort_order')->get();
    }

    #[Computed]
    public function categories()
    {
        $cats = Skill::distinct()->pluck('category')->toArray();
        return empty($cats) ? ['Hardware & Troubleshooting', 'Software Development', 'Network Infrastructure'] : $cats;
    }

    public function resetFields()
    {
        $this->name = '';
        $this->category = 'Hardware & Troubleshooting';
        $this->icon_path = '';
        $this->color = '#0d9488';
        $this->sort_order = Skill::max('sort_order') + 1;
        $this->skillId = null;
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
        $skill = Skill::findOrFail($id);
        $this->skillId = $skill->id;
        $this->name = $skill->name;
        $this->category = $skill->category;
        $this->icon_path = $skill->icon_path;
        $this->color = $skill->color;
        $this->sort_order = $skill->sort_order;
        
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'icon_path' => $this->icon_path,
            'color' => $this->color,
            'sort_order' => $this->sort_order,
        ];

        Skill::updateOrCreate(['id' => $this->skillId], $data);

        $this->showModal = false;
        $this->resetFields();
        
        session()->flash('message', $this->isEditing ? 'Skill diperbarui!' : 'Skill ditambahkan!');
    }

    public function delete($id)
    {
        Skill::findOrFail($id)->delete();
        session()->flash('message', 'Skill dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.skill-manager');
    }
}
