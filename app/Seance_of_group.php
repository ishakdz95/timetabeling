<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance_of_group extends Model
{
    protected $fillable=['day_id','day_name','timeslot_id','timeslot_name','professor_id',
        'professor_first_name','professor_last_name','section_id','section_name',
        'cours_id','cours_name','type'];
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

}
