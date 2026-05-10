<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClassSchedule extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    public function class()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(AcademicSection::class, 'section_id');
    }
}
