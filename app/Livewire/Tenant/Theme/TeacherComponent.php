<?php

namespace App\Livewire\Tenant\Theme;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;

class TeacherComponent extends Component
{
    public string $activeDepartment = 'all';

    public function filterByDepartment(string $department): void
    {
        $this->activeDepartment = $department;
    }

    public function render()
    {
        $departments = Department::whereHas('employees', function ($query) {
            // $query->where('is_active', 1);
        })->get();

        $teachers = Employee::with('department')
            // ->where('is_active', 1)
            ->when($this->activeDepartment !== 'all', function ($query) {
                $query->whereHas('department', function ($q) {
                    $q->where('name', $this->activeDepartment);
                });
            })
            ->get();

        return view('livewire.tenant.theme.teacher-component', [
            'teachers'    => $teachers,
            'departments' => $departments,
        ])->layout('layouts.theme.app', ['title' => 'Teachers']);
    }
}