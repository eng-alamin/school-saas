<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'guardian_student',
            'guardian_id',
            'student_id'
        );
    }

    public function sales()
    {
        return $this->morphMany(Sale::class, 'saleable');
    }
}
