<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicSubject;
use Livewire\Attributes\On;

class SubjectComponent extends Component
{
    public $name;
    public $code;
    public $author;
    public $type;

    public $subject_id;
    public $delete_id;

    public function render()
    {
        $subjects = AcademicSubject::all();

        return view('livewire.tenant.admin.academic.subject-component')
            ->with('subjects', $subjects)
            ->layout('layouts.tenant.app', [
                'title' => "Subjects | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'author' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:100',
        ]);

        try {
            AcademicSubject::create([
                'name' => $this->name,
                'code' => $this->code,
                'author' => $this->author,
                'type' => $this->type,
            ]);

            $this->dispatch('refresh-list');
            $this->dispatch('closeModal', modalId: 'openCreateModal');
            
            $this->dispatch('toast', type: 'success', message: 'Subject created successfully!');

            // Reset input fields
            $this->name = '';
            $this->code = '';
            $this->author = '';
            $this->type = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $subject = AcademicSubject::findOrFail($id);
        $this->subject_id = $subject->id;
        $this->name = $subject->name;
        $this->code = $subject->code;
        $this->author = $subject->author;
        $this->type = $subject->type;

        $this->dispatch('openModal', modalId: 'openEditModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'author' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:100',
        ]);

        try {
            $subject = AcademicSubject::findOrFail($this->subject_id);
            $subject->update([
                'name' => $this->name,
                'code' => $this->code,
                'author' => $this->author,
                'type' => $this->type,
            ]);

            $this->dispatch('refresh-list');
            $this->dispatch('closeModal', modalId: 'openEditModal');
            
            $this->dispatch('toast', type: 'success', message: 'Subject updated successfully!');

            // Reset input fields
            $this->name = '';
            $this->code = '';
            $this->author = '';
            $this->type = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }

    #[On('deleteConfirmed')]
    public function deleteSubject($id)
    {
        try {
            $subject = AcademicSubject::findOrFail($id);
            $subject->delete();
            $this->dispatch('refresh-list');
            $this->dispatch('toast', type: 'success', message: 'Subject deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Deletion failed: ' . $e->getMessage());
        }
    }

}