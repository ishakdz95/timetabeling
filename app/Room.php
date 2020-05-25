<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['code','available'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
}
