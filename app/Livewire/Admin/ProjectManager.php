<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class ProjectManager extends Component
{
    use WithFileUploads;

    public $name, $description, $tags, $gradient, $url, $status, $sort_order;
    public $projectId;
    public $isEditing = false;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|array',
        'gradient' => 'nullable|string',
        'url' => 'nullable|url',
        'status' => 'required|in:draft,published',
        'sort_order' => 'required|integer',
    ];

    public function mount()
    {
        $this->resetFields();
    }

    #[Computed]
    public function projects()
    {
        return Project::orderBy('sort_order')->get();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->tags = [];
        $this->gradient = 'linear-gradient(135deg,#0d9488,#2dd4bf)';
        $this->url = '';
        $this->status = 'published';
        $this->sort_order = Project::max('sort_order') + 1;
        $this->projectId = null;
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
        $project = Project::findOrFail($id);
        $this->projectId = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->tags = $project->tags ?? [];
        $this->gradient = $project->gradient;
        $this->url = $project->url;
        $this->status = $project->status;
        $this->sort_order = $project->sort_order;
        
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'tags' => $this->tags,
            'gradient' => $this->gradient,
            'url' => $this->url,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
        ];

        Project::updateOrCreate(['id' => $this->projectId], $data);

        $this->showModal = false;
        $this->resetFields();
        
        session()->flash('message', $this->isEditing ? 'Proyek diperbarui!' : 'Proyek ditambahkan!');
    }

    public function delete($id)
    {
        Project::findOrFail($id)->delete();
        session()->flash('message', 'Proyek dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.project-manager');
    }
}
