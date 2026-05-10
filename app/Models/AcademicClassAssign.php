<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClassAssign extends Model
{
    protected $guarded = [];

    protected $casts = [
        'subjects' => 'array',
    ];

    public function class()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(AcademicSection::class, 'section_id');
    }

    public function sections()
    {
        return $this->hasMany(AcademicSection::class, 'class_id');
    }
}
