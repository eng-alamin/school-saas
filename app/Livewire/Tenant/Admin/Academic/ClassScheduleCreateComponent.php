<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicClassSchedule;
use App\Models\AcademicClass;
use App\Models\AcademicSection;
use App\Models\AcademicSubject;

class ClassScheduleCreateComponent extends Component
{
    public $class_id;
    public $section_id;
    public $day;
    public $data = [];

    public $schedule = null;
    public $hasSchedule = false;
    public $schedule_id;

    public function render()
    {
        $classes = AcademicClass::all();
        $sections = AcademicSection::all();
        $subjects = AcademicSubject::all();

        return view('livewire.tenant.admin.academic.class-schedule-create-component')
            ->with('classes', $classes)
            ->with('sections', $sections)
            ->with('subjects', $subjects)
            ->layout('layouts.tenant.app', [
                'title' => "Class Schedule | School SaaS",
            ]);
    }

    public function filter()
    {

        if (!$this->class_id || !$this->section_id || !$this->day) return;

        $schedule = AcademicClassSchedule::where('class_id', $this->class_id)
            ->where('section_id', $this->section_id)
            ->where('day', $this->day)
            ->first();

        if ($schedule) {
            $this->data = $schedule->data;
            $this->schedule_id = $schedule->id;
            $this->hasSchedule = true;
        } else {
            $this->schedule_id = null;
            $this->data = [
                [
                    'subject'    => '',
                    'teacher'    => '',
                    'start_time' => '09:00',
                    'end_time'   => '10:00',
                    'class_room' => '',
                ]
            ];
            $this->hasSchedule = true;
        }

    }

    public function addRow()
    {
        $this->data[] = [
            'subject' => '',
            'teacher' => '',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'class_room' => '',
        ];

        $this->dispatch('rowAdded');
    }

    public function removeRow($index)
    {
        unset($this->data[$index]);
        $this->data = array_values($this->data);
    }

    public function save()
    {
        $this->validate([
            'class_id' => 'required|exists:academic_classes,id',
            'section_id' => 'required|exists:academic_sections,id',
            'day' => 'required|string|max:20',

            'data.*.subject' => 'required',
            'data.*.teacher' => 'required',
            'data.*.start_time' => 'required|date_format:H:i',
            'data.*.end_time' => 'required|date_format:H:i|after:data.*.start_time',
            'data.*.class_room' => 'nullable|string|max:100',
        ]);

        try {
            AcademicClassSchedule::updateOrCreate(
                [
                    'class_id'   => $this->class_id,
                    'section_id' => $this->section_id,
                    'day'        => $this->day,
                ],
                [
                    'data' => $this->data,
                ]
            );
            
            $this->dispatch('toast', type: 'success', message: 'Class schedule saved successfully!');

        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }
}
