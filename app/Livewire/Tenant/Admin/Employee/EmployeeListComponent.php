<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Employee;

class EmployeeListComponent extends Component
{
    public $employee_id;

    public function render()
    {
        $employees = Employee::with('designation', 'department')->latest()->get();

        return view('livewire.tenant.admin.employee.employee-list-component')
            ->with('employees', $employees)
            ->layout('layouts.tenant.app', [
                'title' => "Employee List | School SaaS",
            ]);
    }

    public function delete($id)
    {

    dd($id);
        $data = Employee::findOrFail($id);
        $data->delete();

        $this->dispatch('toast', type: 'success', message: 'Employee deleted successfully!');
    }
}
