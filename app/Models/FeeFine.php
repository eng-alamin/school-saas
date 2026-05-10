<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeFine extends Model
{
    protected $guarded = [];
    
    public function feeGroup()
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function feeGroupItem()
    {
        return $this->belongsTo(FeeGroupItem::class);
    }
}
