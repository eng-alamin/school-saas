<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicClass;
use App\Models\AcademicSection;
use Livewire\Attributes\On;

class ClassComponent extends Component
{
    public $name;
    public $numeric;
    public $section_id;

    public $class_id;
    public $delete_id;

    public function mount()
    {
        $this->sections = AcademicSection::all();

        $this->section_id = $this->sections->first()?->id ?? null;
    }

    public function render()
    {
        $this->dispatch('refresh-list', AcademicClass::all()->toArray());
        
        $classes = AcademicClass::with('section')->get();
        $sections = AcademicSection::all();

        return view('livewire.tenant.admin.academic.class-component')
            ->with('classes', $classes)
            ->with('sections', $sections)
            ->layout('layouts.tenant.app', [
                'title' => "Classes | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'numeric' => 'required|integer|min:1',
            'section_id' => 'required|exists:academic_sections,id',
        ]);

        try {
            AcademicClass::create([
                'name' => $this->name,
                'numeric' => $this->numeric,
                'section_id' => $this->section_id,
            ]);

            $this->dispatch('refresh-list', AcademicClass::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Class created successfully!');

            // Reset input fields
            $this->name = '';
            $this->numeric = '';
            $this->section_id = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $class = AcademicClass::findOrFail($id);
        $this->class_id = $class->id;
        $this->name = $class->name;
        $this->numeric = $class->numeric;
        $this->section_id = $class->section_id;

        $this->dispatch('refresh-list', AcademicClass::all()->toArray());
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'numeric' => 'required|integer|min:1',
            'section_id' => 'required|exists:academic_sections,id',
        ]);

        try {
            $class = AcademicClass::findOrFail($id);
            $class->update([
                'name' => $this->name,
                'numeric' => $this->numeric,
                'section_id' => $this->section_id,
            ]);

            $this->dispatch('refresh-list', AcademicClass::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Class updated successfully!');

            // Reset input fields
            $this->name = '';
            $this->numeric = '';
            $this->section_id = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }
    
    #[On('deleteConfirmed')]
    public function delete($id)
    {
        try {
            $class = AcademicClass::findOrFail($id);
            $class->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Class deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }

}
