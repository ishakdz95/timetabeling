<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['name','year_id','type','priority'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function sections()
    {
        return $this->belongsToMany(section::class);
    }
}
