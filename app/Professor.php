<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public $id1=0;
    public $first_name1='';
    public $last_name1='';
    protected $fillable =['first_name','last_name','grade','sex','hour','available','type'];

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
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

    public function random_professor04(Course $course){
        $bool=true;
       $professors=$course->professors->where('hour', '>', 0);
        $count=count($professors);
        $rand = rand(0, $count - 1);
        $professor = $professors[$rand];
        //if ($professor->hour > 0) {
            return $professor;
        //}
        //return $professor;
    }


}
