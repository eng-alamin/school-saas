<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeExpense extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
    ];

    public function account()
    {
        return $this->belongsTo(OfficeAccount::class, 'account_id');
    }

    public function head()
    {
        return $this->belongsTo(OfficeHead::class, 'head_id');
    }
}
