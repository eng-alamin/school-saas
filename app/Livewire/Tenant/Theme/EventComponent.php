<?php

namespace App\Livewire\Tenant\Theme;

use Livewire\Component;
use App\Models\Event;

class EventComponent extends Component
{
    public function render()
    {
        $events = Event::where('show_website', 1)->get();

        return view('livewire.tenant.theme.event-component', [
            'events' => $events,
        ])->layout('layouts.theme.app', ['title' => 'Events']);
    }
}