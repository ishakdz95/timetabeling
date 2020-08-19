<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable=['name','day_id','available'];


    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function sections()
    {
        return $this->belongsToMany(section::class);
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class);
    }



}
