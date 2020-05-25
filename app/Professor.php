<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable =['first_name','last_name','grade','sex','hour'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }

}
