<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;

class SkillManager extends Component
{
    public $skills;
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
        $this->loadSkills();
        $this->resetFields();
    }

    public function loadSkills()
    {
        $this->skills = Skill::orderBy('category')->orderBy('sort_order')->get();
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

        if ($this->isEditing) {
            Skill::find($this->skillId)->update($data);
        } else {
            Skill::create($data);
        }

        $this->loadSkills();
        $this->showModal = false;
        $this->resetFields();
        
        session()->flash('message', $this->isEditing ? 'Skill diperbarui!' : 'Skill ditambahkan!');
    }

    public function delete($id)
    {
        Skill::find($id)->delete();
        $this->loadSkills();
        session()->flash('message', 'Skill dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.skill-manager');
    }
}
