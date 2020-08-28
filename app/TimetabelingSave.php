<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimetabelingSave extends Model
{
    protected $fillable=['day_id','day_name','timeslot_id', 'timeslot_name',
        'room_id','room_name','$professor_id','$professor_first_name',
        '$professor_last_name','cours_id','cours_name','set_id', 'set_name','type'];
}
