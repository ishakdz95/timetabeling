<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['name','year_id'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
