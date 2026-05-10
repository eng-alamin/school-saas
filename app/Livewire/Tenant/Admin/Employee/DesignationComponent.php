<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Designation;
use Livewire\Attributes\On;

class DesignationComponent extends Component
{
    public $name;

    public $designation_id;
    public $delete_id;

    public function render()
    {
        $this->dispatch('refresh-list', Designation::all()->toArray());
        
        $designations = Designation::all();

        return view('livewire.tenant.admin.employee.designation-component')
            ->with('designations', $designations)
            ->layout('layouts.tenant.app', [
                'title' => "Designation | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Designation::create([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', Designation::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Designation created successfully!');

            // Reset input fields
            $this->name = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Designation::findOrFail($id);
        $this->designation_id = $data->id;
        $this->name = $data->name;

        $this->dispatch('refresh-list', Designation::all()->toArray());
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $data = Designation::findOrFail($this->designation_id);
            $data->update([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', Designation::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Designation updated successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }



    #[On('deleteConfirmed')]
    public function deleteDesignation($id)
    {
        try {
            $data = Designation::findOrFail($id);
            $data->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Designation deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }
}

