<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['name','year_id'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
}
