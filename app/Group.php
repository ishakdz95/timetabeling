<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['name','section_id'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function section(){
        return $this->belongsTo(section::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function seance_of_groups()
    {
        return $this->belongsToMany(Seance_of_group::class);
    }
}
