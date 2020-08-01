<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTabeling extends Model
{
    public function cour_group(){
        $groups=Group::all();
        $courses=Course::all();
        $group_courses[]=[];
        $group_cours='';
        $group_year='';
        $cours_year='';
        $i=0;
        foreach ($groups as $group){
            $group_year=$group->year->name;
            foreach ($courses as $cours){
                $cours_year=$cours->year->name;
                if($group_year==$cours_year){
                    $group->courses()->attach($cours);
                    $group_cours=$group_year.' '.$group->name.' '.$cours->name;
                    $group_courses[$i]=$group_cours;
                    $i++;
                }
            }
        }
        return $group_courses;
    }
    public function professor_available(int $a,Professor $professor){
        if ($a>=6){
            $professor->available=false;
            $professor->save();
        }
        return $professor->available;

    }
    public function intialise_professors(){
        $professors=Professor::all();
        foreach ($professors as $professor) {
            $professor->available=true;
            $professor->save();
        }
    }
    public function find_room(Timeslot $timeslot){
        $rooms=Room::all();
        foreach ($rooms as $room){
            if($room->timeslots()->find($timeslot->id)==null){
                $room->timeslots()->attach($timeslot);
                return $room;
            }
        }
    }
    public function dettach_rooom_timeslots(){
         $rooms=Room::all();
            foreach ($rooms as $room){
               $room->timeslots()->detach();
             }
         }
    public function dettach_professor_timeslots(){
        $professros=Professor::all();
        foreach ($professros as $professor){
            $professor->timeslots()->detach();
        }
    }
    public function intialise_rooms(){
        $rooms=Room::all();
        foreach ($rooms as $room){
            $room->available=true;
            $room->save();
        }
    }
    public function dettach_group_course(){
        $groups=Group::all();
        foreach ($groups as $group){
            $group->courses()->detach();
        }

    }

}
