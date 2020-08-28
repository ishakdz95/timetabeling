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
public function intial_professor(){
        $professors=Professor::all();
        $i=1;
        foreach ($professors as $professor){
            $professor->id=$i;
            $professor->hour=6;
            $professor->save();
            $i++;
        }
}
  public function random_professor(){
        $professors=Professor::all();
        $random=rand(1,count($professors));
        $professor=$professors->find($random);
     return $professor;

  }

}
