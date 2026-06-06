<?php

namespace App\Livewire\Tenant\Theme;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.tenant.theme.home-component')
            ->layout('layouts.theme.app', ['title' => 'Home']);
    }
}
