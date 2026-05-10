<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventorySupplier extends Model
{
    protected $guarded = [];

    public function purchases()
    {
        return $this->hasMany(InventoryPurchase::class);
    }

}
