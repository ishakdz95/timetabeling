<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable =['first_name','last_name','grade','sex','hour','available'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function find_timeslot(){
        $timeslots=Timeslot::all();
        foreach ($timeslots as $timeslot){
            if ($timeslot->available==true){
                $t=$timeslot;
                $timeslot->available=false;
                $timeslot->save();
                return $t;
            }
        }

    }
    public function initialise_timeslots(){
        $timeslots=Timeslot::all();
        foreach ($timeslots as $timeslot){
            $timeslot->available=true;
            $timeslot->save();
        }
    }

}
