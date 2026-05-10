<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Department;
use Livewire\Attributes\On;

class DepartmentComponent extends Component
{
    public $name;

    public $department_id;
    public $delete_id;


    public function render()
    {
        $this->dispatch('refresh-list', Department::all()->toArray());
        
        $departments = Department::all();

        return view('livewire.tenant.admin.employee.department-component')
            ->with('departments', $departments)
            ->layout('layouts.tenant.app', [
                'title' => "Departments | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Department::create([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', Department::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Department created successfully!');

            // Reset input fields
            $this->name = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        $this->department_id = $data->id;
        $this->name = $data->name;

        $this->dispatch('refresh-list', Department::all()->toArray());
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $data = Department::findOrFail($this->department_id);
            $data->update([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', Department::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Department updated successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }



    #[On('deleteConfirmed')]
    public function deleteDepartment($id)
    {
        try {
            $data = Department::findOrFail($id);
            $data->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Department deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }
}

