<?php

namespace App\Livewire\Tenant\Admin\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OverviewComponent extends Component
{
    public $user;
 
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.tenant.admin.profile.overview-component')
            ->with('user', $this->user)
            ->layout('layouts.tenant.app', [
                    'title' => "Profile Overview | School SaaS",
                ]);
    }
}
