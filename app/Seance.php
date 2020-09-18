<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{


    protected $fillable=['day_id','day_name','timeslot_id',
        'timeslot_name','room_id','room_name','cours_id','cours_name','set_id',
        'set_name','type','available','priority'];

}
