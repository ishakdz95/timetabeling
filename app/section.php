<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable=['name','year_id'];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
}
