<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeGroup extends Model
{
    protected $guarded = [];
    
    public function items()
    {
        return $this->hasMany(FeeGroupItem::class);
    }

    public function fines()
    {
        return $this->hasMany(FeeFine::class);
    }

    public function allocations()
    {
        return $this->hasMany(FeeAllocation::class);
    }
}
