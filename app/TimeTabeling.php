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
    public function find_seance_timeslot(Seance $seance){
        $timeslots=Timeslot::all();
        $sections=section::all();
            $section=$sections->find($seance->section_id);
            foreach ($timeslots as $timeslot){
                if ($timeslot->available==true){
                    $section->timeslots()->syncWithoutDetaching($timeslot);
                }
            }


    }


    public function delete_seance(){
        $seances=Seance::all();
        foreach ($seances as $seance){
            $seance->delete();
        }
    }
    public function make_section_seance_without_professor(){
        $seances_of_sections=Seance_of_Section::all();
        $rooms_timeslots=Room_Timeslot::all();
        $sections=section::all();
        $timeslots=Timeslot::all();
        foreach ($seances_of_sections as $ss){
            foreach ($rooms_timeslots as $rt){
                if ($ss->available==true){
                    if ($rt->available==true){
                        if ($ss->type==$rt->type){
                            $seance = new Seance();
                            $seance->day_id=$rt->day_id;
                            $seance->day_name=$rt->day_name;
                            $seance->timeslot_id=$rt->timeslot_id;
                            $seance->timeslot_name=$rt->timeslot_name;
                            $seance->room_id=$rt->room_id;
                            $seance->room_name=$rt->room_name;
                            $seance->cours_id=$ss->cours_id;
                            $seance->cours_name=$ss->cours_name;
                            $seance->set_id=$ss->section_id;
                            $seance->set_name=$ss->section_name;
                            $seance->type=$ss->type;
                            $section=$sections->find($ss->section_id);
                            $timeslot=$timeslots->find($rt->timeslot_id);
                            $section->timeslots()->attach($timeslot);
                            foreach($section->groups as $group){
                                $group->timeslots()->attach($timeslot);
                            }
                            $seance->save();
                            $ss->available=false;
                            $rt->available=false;
                        }
                    }
                }
            }
        }
    }
    public function make_td_seance_without_professor(){
        $seances_of_tds=Seance_of_Td::all();
        $rooms_timeslots=Room_Timeslot::all();
        $groups=Group::all();
        $sections=section::all();
        $timeslots=Timeslot::all();
        foreach ($seances_of_tds as $st){
            foreach ($rooms_timeslots as $rt){
                if ($st->available==true){
                    if ($rt->available==true){
                        if ($st->type==$rt->type){
                            $timeslot=$timeslots->find($rt->timeslot_id);
                            $group=$groups->find($st->group_id);
                            if($group->timeslots()->find($rt->timeslot_id)==null){
                                $seance = new Seance();
                                $seance->day_id=$rt->day_id;
                                $seance->day_name=$rt->day_name;
                                $seance->timeslot_id=$rt->timeslot_id;
                                $seance->timeslot_name=$rt->timeslot_name;
                                $seance->room_id=$rt->room_id;
                                $seance->room_name=$rt->room_name;
                                $seance->cours_id=$st->cours_id;
                                $seance->cours_name=$st->cours_name;
                                $seance->set_id=$st->group_id;
                                $seance->set_name=$st->group_name;
                                $seance->type=$st->type;
                                $timeslot=$timeslots->find($rt->timeslot_id);
                                $group->timeslots()->attach($timeslot);
                                $seance->save();
                                $st->available=false;
                                $rt->available=false;
                                $st->save();
                                $rt->save();

                            }

                        }
                    }
                }
            }
        }
    }
}
