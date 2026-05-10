<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicSection;
use Livewire\Attributes\On;

class SectionComponent extends Component
{
    public $name;
    public $capacity;
    public $section_id;
    public $delete_id;

    public function render()
    {
        $this->dispatch('refresh-list', AcademicSection::all()->toArray());

        $sections = AcademicSection::all();

        return view('livewire.tenant.admin.academic.section-component')
            ->with('sections', $sections)
            ->layout('layouts.tenant.app', [
                'title' => "Sections | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        try {
            AcademicSection::create([
                'name' => $this->name,
                'capacity' => $this->capacity,
            ]);

            $this->dispatch('refresh-list', AcademicSection::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Section created successfully!');

            // Reset input fields
            $this->name = '';
            $this->capacity = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $section = AcademicSection::findOrFail($id);
        $this->section_id = $section->id;
        $this->name = $section->name;
        $this->capacity = $section->capacity;

        $this->dispatch('refresh-list', AcademicSection::all()->toArray());
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        try {
            $section = AcademicSection::findOrFail($id);
            $section->update([
                'name' => $this->name,
                'capacity' => $this->capacity,
            ]);

            $this->dispatch('refresh-list', AcademicSection::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Section updated successfully!');

            // Reset input fields
            $this->name = '';
            $this->capacity = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }

    #[On('deleteConfirmed')]
    public function delete($id)
    {
        try {
            $section = AcademicSection::findOrFail($id);
            $section->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Section deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }
}
