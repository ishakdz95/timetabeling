<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance_of_group extends Model
{
    protected $fillable=['day_id','day_name','timeslot_id','timeslot_name','professor_id',
        'professor_first_name','professor_last_name','section_id','section_name',
        'cours_id','room_id','room_name','cours_name','type','year_id','year_name'];
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

}
