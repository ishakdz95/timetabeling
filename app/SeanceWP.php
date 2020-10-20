<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeanceWP extends Model
{
    public $day_id=0;
    public $day_name='';
    public $timeslot_id=0;
    public $timeslot_name='';
    public $room_id=0;
    public $room_name='';
    public $cours_id=0;
    public $cours_name='';
    public $set_id=0;
    public $set_name='';
    public $year_id=0;
    public $year_name='';
    public $type='';
    public $priority='';
    public $available=true;
}
