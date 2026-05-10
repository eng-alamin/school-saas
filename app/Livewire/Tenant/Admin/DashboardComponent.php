<?php

namespace App\Livewire\Tenant\Admin;

use Livewire\Component;
// use App\Models\Student;

class DashboardComponent extends Component
{
    public $studentsCount;
    public $tenantName;

    public function mount()
    {
        $this->tenantName = tenant('id');
        // $this->studentsCount = Student::count();
    }

    public function render()
    {
        return view('livewire.tenant.admin.dashboard-component')
        ->layout('layouts.tenant.app', [
            'title' => "Dashboard | Monarchy School",
        ]);
    }
}
