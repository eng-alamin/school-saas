<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryTemplateAllowance extends Model
{
    protected $guarded = [];

    public function salaryTemplate()
    {
        return $this->belongsTo(SalaryTemplate::class);
    }
}
