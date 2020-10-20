<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{


    protected $fillable=['day_id','day_name','timeslot_id',
        'timeslot_name','room_id','room_name','cours_id','cours_name','set_id',
        'set_name','type','available','priority','year_id','year_name'];
    public function getSeance(){
        $seances=Seance::all();
        foreach ($seances as $seance){
            if ($seance->available==true){
                $seance->available=false;
                $seance->save();
                return $seance;
            }

        }
    }
    public function delete_seance(){
        $seances=Seance::all();
        foreach ($seances as $seance){
            $seance->delete();
        }
    }
    public function initial_seance(){
        $seances=Seance::all();
        foreach ($seances as $seance){
            $seance->available=true;
            $seance->save();
        }
    }

}
