<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSetup extends Model
{
    protected $guarded = [];

    protected $casts = [
        'marks' => 'array',
    ];

    public function term()
    {
        return $this->belongsTo(ExamTerm::class, 'exam_term_id');
    }

    public function type()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }
}
