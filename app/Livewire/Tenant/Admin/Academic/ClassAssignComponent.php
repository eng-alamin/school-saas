<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicClassAssign;
use App\Models\AcademicClass;
use App\Models\AcademicSection;
use App\Models\AcademicSubject;
use Livewire\Attributes\On;

class ClassAssignComponent extends Component
{
    public $class_id;
    public $section_id;
    public array $subject_array;

    public $assign_id;
    public $delete_id;

    public function render()
    {
        $assigns = AcademicClassAssign::with('class', 'section')->get();

        $classes = AcademicClass::all();
        $sections = AcademicSection::all();
        $subjects = AcademicSubject::pluck('name', 'id');

        return view('livewire.tenant.admin.academic.class-assign-component')
            ->with('assigns', $assigns)
            ->with('classes', $classes)
            ->with('sections', $sections)
            ->with('subjects', $subjects)
            ->layout('layouts.tenant.app', [
                'title' => "Class Assignments | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'class_id' => 'required|exists:academic_classes,id',
            'section_id' => 'required|exists:academic_sections,id',
            'subject_array'   => 'nullable|array',
            'subject_array.*' => 'nullable|string',
        ]);

        try {
            AcademicClassAssign::create([
                'class_id' => $this->class_id,
                'section_id' => $this->section_id,
                'subjects' => $this->subject_array,
            ]);

            $this->dispatch('refresh-list');
            $this->dispatch('closeModal', modalId: 'openCreateModal');
            
            $this->dispatch('toast', type: 'success', message: 'Class assigned successfully!');

            // Reset input fields
            $this->class_id = '';
            $this->section_id = '';
            $this->subject_array = [];
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Assignment failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $assign = AcademicClassAssign::findOrFail($id);
        $this->assign_id = $assign->id;
        $this->class_id = $assign->class_id;
        $this->section_id = $assign->section_id;
         $this->subject_array = $assign->subjects ?? [];

        $this->dispatch('showModalChanged', selected: $this->subject_array);
        $this->dispatch('openModal', modalId: 'openEditModal');
    }

    public function update($id)
    {
        $this->validate([
            'class_id' => 'required|exists:academic_classes,id',
            'section_id' => 'required|exists:academic_sections,id',
            'subject_array'   => 'nullable|array',
            'subject_array.*' => 'nullable|string',
        ]);

        try {
            $assign = AcademicClassAssign::findOrFail($id);
            $assign->update([
                'class_id' => $this->class_id,
                'section_id' => $this->section_id,
                'subjects' => $this->subject_array,
            ]);

            $this->dispatch('refresh-list');
            $this->dispatch('closeModal', modalId: 'openEditModal');
            
            $this->dispatch('toast', type: 'success', message: 'Assignment updated successfully!');

            // Reset input fields
            $this->assign_id = '';
            $this->class_id = '';
            $this->section_id = '';
            $this->subjects = [];
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }

    }

    #[On('deleteConfirmed')]
    public function delete($id)
    {
        try {
            $subject = AcademicClassAssign::findOrFail($id);
            $subject->delete();
            $this->dispatch('refresh-list');
            $this->dispatch('toast', type: 'success', message: 'Assignment deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Deletion failed: ' . $e->getMessage());
        }
    }
}
