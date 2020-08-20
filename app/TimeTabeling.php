<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTabeling extends Model
{
    public $group_id;
    public $group_name='';
    public $cours_id;
    public $cours_name='';
    public $professor_id;
    public $professor_name='';
    public $room_id;
    public $room_name='';
    public $timeslot_id;
    public $timeslot_name;
    public $section_id;
    public $section_name;
    public $day_id=0;
    public $day_name='';
    public $type='';
    public function cour_group(){
        $groups=Group::all();
        $courses=Course::all();
        $sections=section::all();
        $courses_names[]=[];
        $groups_names[]=[];
        $seances=array();
        $cours_name='';
        $group_name='';
        $group_year='';
        $cours_year='';
        $id=0;
        foreach ($sections as $section)
        {
            $section_year=$section->year->name;
                foreach ($courses as $cours){
                    $cours_year=$cours->year->name;
                    $cours_type=$cours->type;
                    if($section_year==$cours_year){
                        if($cours->type=='Cours'){
                            $section->courses()->syncWithoutDetaching($cours);
                            foreach ($section->groups as $group){
                                $group->courses()->syncWithoutDetaching($cours);
                            }
                            $seance=new Seance();
                            $seance->section_id=$section->id;
                            $seance->section_name=$section->name;
                            $seance->cours_id=$cours->id;
                            $seance->cours_name=$cours->name;
                            $seance->type=$cours_type;
                            $seances[$id]=$seance;
                            $id++;
                        }
                        else{
                            foreach ($section->groups as $group){
                                $group->courses()->syncWithoutDetaching($cours);
                                $seance=new Seance();
                                $seance->section_id=$section->id;
                                $seance->section_name=$section->name;
                                $seance->group_id=$group->id;
                                $seance->group_name=$group->name;
                                $seance->cours_id=$cours->id;
                                $seance->cours_name=$cours->name;
                                $seance->type=$cours_type;
                                $seances[$id]=$seance;
                                $id++;
                            }
                        }
                    }
                }
            }
        return $seances;
    }

    public function professor_available(int $hour,Professor $professor){
        if ($hour>5){
            $professor->available=false;
            $professor->save();
        }
        return $professor->available;

    }
    public function intialise_professors(){
        $professors=Professor::all();
        foreach ($professors as $professor) {
            $professor->available=true;
            $professor->hour=6;
            $professor->save();
        }
    }
    public function find_room(Timeslot $timeslot,Seance $seance){
        $rooms=Room::all();
        foreach ($rooms as $room){
            if($room->timeslots()->find($timeslot->id)==null){
                if($room->type==$seance->type){
                    $room->timeslots()->attach($timeslot);
                    return $room;
                }

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
    public function dettach_group_timeslots(){
        $groups=Group::all();
        foreach ($groups as $group){
            $group->timeslots()->detach();
        }
    }
    public function dettach_section_timeslots(){
        $sections=section::all();
        foreach ($sections as $section){
            $section->timeslots()->detach();
        }
    }
    public function dettach_cours_timeslots(){
        $courses=Course::all();
        foreach ($courses as $cours){
            $cours->timeslots()->detach();
        }
    }
    public function attach_cours_timeslot(string $cours_id,Timeslot $timeslot)
    {
        $courses = Course::all();
        foreach ($courses as $cours) {

            if ($cours->id == $cours_id) {
                $cours->timeslots()->attach($timeslot);
            }

        }
    }
    public function attach_groups_timeslot(string $group_id,Timeslot $timeslot){
        $groups=Group::all();
        foreach ($groups as $group) {
            if ($group->id == $group_id) {
                if($group->timeslots()->find($timeslot->id)==null){
                    $group->timeslots()->syncWithoutDetaching($timeslot);
                    //$timeslot->sections()->syncWithoutDetaching($group->section);
                }
            }
        }
    }

    public function attach_section_timeslot(string $section_id,Timeslot $timeslot){
        $sections=section::all();
        foreach ($sections as $section) {
            if ($section->id == $section_id) {
                    $section->timeslots()->syncWithoutDetaching($timeslot);
                    foreach ($section->groups as $group){
                        $group->timeslots()->attach($timeslot);
                }
            }
        }
    }

    public function attache_science_timeslot(Seance $seance,Timeslot $timeslot){
        $groups=Group::all();
        $sections=section::all();
        $cours=Course::all();
        $section=$sections->find($seance->section_id);
        if($seance->type=='Cours'){
                    $section->timeslots()->attach($timeslot);
                    $cour=$cours->find($seance->cours_id);
                    $cour->timeslots()->attach($timeslot);
                    foreach ($section->groups as $group){
                    $group->timeslots()->attach($timeslot);
                 }
        }
        else{
            $group=$groups->find($seance->group_id);
                $group->timeslots()->attach($timeslot);
                $cour=$cours->find($seance->cours_id);
                $cour->timeslots()->attach($timeslot);
        }
    }

}
