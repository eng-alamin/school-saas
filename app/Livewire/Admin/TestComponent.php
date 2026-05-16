<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class TestComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.test-component')
                ->layout('layouts.tenant.app', [
            'title' => "Test | Monarchy School",
        ]);
    }
}
