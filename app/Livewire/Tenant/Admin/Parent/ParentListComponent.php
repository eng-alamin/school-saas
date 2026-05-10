<?php

namespace App\Livewire\Tenant\Admin\Parent;

use Livewire\Component;
use App\Models\Guardian;

class ParentListComponent extends Component
{
    public $parent_id;

    public function render()
    {
        $parents = Guardian::with('students')->latest()->get();

        return view('livewire.tenant.admin.parent.parent-list-component')
            ->with('parents', $parents)
            ->layout('layouts.tenant.app', [
                'title' => "Parent List | School SaaS",
            ]);

    }

    public function delete($id)
    {
        $data = Guardian::findOrFail($id);
        $data->delete();

        $this->dispatch('toast', type: 'success', message: 'Parent deleted successfully!');
    }
}
