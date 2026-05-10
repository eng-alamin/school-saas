<?php

namespace App\Livewire\Tenant\Admin;

use Livewire\Component;
use App\Models\Student;

class StudentOverviewComponent extends Component
{
    public $student;
    public $feeAllocations;

    public $selectedIds = [];
    public $selectAll   = false;

    public function mount(int $id)
    {
        $this->student = Student::with([
            'class',
            'section',
            'guardians',
        ])->findOrFail($id);
    }

    public function updatedSelectAll(bool $value)
    {
        if ($value) {
            $ids = [];
            foreach ($this->feeAllocations as $allocation) {
                foreach ($allocation->feeGroup->items as $item) {
                    $ids[] = $item->id;
                }
            }
            $this->selectedIds = $ids;
        } else {
            $this->selectedIds = [];
        }
    }

    public function updatedSelectedIds()
    {
        $total = $this->feeAllocations->sum(
            fn($a) => $a->feeGroup->items->count()
        );
        $this->selectAll = count($this->selectedIds) === $total;
    }

    public function collectSelected()
    {
        $this->dispatch('toast', type: 'success', message: count($this->selectedIds) . ' fee(s) selected for collection.');
    }

    public function render()
    {
        return view('livewire.tenant.admin.student-overview-component')
            ->layout('layouts.tenant.app', [
                'title' => "Student Overview | School SaaS",
            ]);
    }
}
