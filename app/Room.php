<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['code','available','type'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
}
