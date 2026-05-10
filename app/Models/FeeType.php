<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    protected $guarded = [];
    
    public function feeGroupItems()
    {
        return $this->hasMany(FeeGroupItem::class);
    }
}
