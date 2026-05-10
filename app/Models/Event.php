<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function eventClasses()
    {
        return $this->hasMany(EventClass::class);
    }

    public function eventSections()
    {
        return $this->hasMany(EventSection::class);
    }
}
