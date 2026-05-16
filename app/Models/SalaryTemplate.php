<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryTemplate extends Model
{
    protected $guarded = [];

    public function allowances()
    {
        return $this->hasMany(SalaryTemplateAllowance::class);
    }

    public function deductions()
    {
        return $this->hasMany(SalaryTemplateDeduction::class);
    }
}
