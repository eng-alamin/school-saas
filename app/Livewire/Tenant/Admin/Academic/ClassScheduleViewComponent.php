<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicClassSchedule;
use App\Models\AcademicClass;
use App\Models\AcademicSection;
use App\Models\AcademicSubject;


class ClassScheduleViewComponent extends Component
{
    public $schedule_id;
    public $class_id;
    public $section_id;

    public function mount($id)
    {
        
        $schedule = AcademicClassSchedule::with(['class', 'section'])->find($id);

        if (!$schedule) {
            abort(404);
        }

        $this->schedule_id = $schedule->id;
        $this->class_id = $schedule->class->id;
        $this->section_id = $schedule->section->id;
    }

    public function render()
    {
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    
        $schedules = AcademicClassSchedule::where('class_id', $this->class_id)
            ->where('section_id', $this->section_id)
            ->get()
            ->keyBy('day');

        $maxCols = $schedules->isNotEmpty() 
            ? $schedules->max(fn($s) => count($s->data ?? [])) 
            : 5;


        $schedule = AcademicClassSchedule::with(['class', 'section'])->find($this->schedule_id);

        return view('livewire.tenant.admin.academic.class-schedule-view-component')
            ->with('days', $days)
            ->with('schedule', $schedule)
            ->with('schedules', $schedules)
            ->with('maxCols', $maxCols)
            ->layout('layouts.tenant.app', [
                'title' => "Class Schedule | School SaaS",
            ]);
    }

}
