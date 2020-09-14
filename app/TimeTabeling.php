<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTabeling extends Model
{
    protected $fillable=['day_id','day_name','timeslot_id', 'timeslot_name',
        'room_id','room_name','$professor_id','$professor_first_name',
        '$professor_last_name','cours_id','cours_name','set_id',
        'set_name','type','available','fitness'];
    public function dettach_timeslots(){
         $rooms=Room::all();
            foreach ($rooms as $room){
               $room->timeslots()->detach();
             }
        $professros=Professor::all();
        foreach ($professros as $professor){
            $professor->timeslots()->detach();
        }
        $groups=Group::all();
        foreach ($groups as $group){
            $group->timeslots()->detach();
        }
        $sections=section::all();
        foreach ($sections as $section){
            $section->timeslots()->detach();
        }
        $courses=Course::all();
        foreach ($courses as $cours){
            $cours->timeslots()->detach();
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
                            $timeslot=$timeslots->find($rt->timeslot_id);
                            $section=$sections->find($ss->section_id);
                            if($section->timeslots()->find($rt->timeslot_id)==null) {
                                $seance = new Seance();
                                $seance->day_id = $rt->day_id;
                                $seance->day_name = $rt->day_name;
                                $seance->timeslot_id = $rt->timeslot_id;
                                $seance->timeslot_name = $rt->timeslot_name;
                                $seance->room_id = $rt->room_id;
                                $seance->room_name = $rt->room_name;
                                $seance->cours_id = $ss->cours_id;
                                $seance->cours_name = $ss->cours_name;
                                $seance->set_id = $ss->section_id;
                                $seance->set_name = $ss->section_name;
                                $seance->type = $ss->type;
                                $seance->available = $ss->available;
                                $section = $sections->find($ss->section_id);
                                $timeslot = $timeslots->find($rt->timeslot_id);
                                $section->timeslots()->attach($timeslot);
                                foreach ($section->groups as $group) {
                                    $group->timeslots()->attach($timeslot);
                                }
                                $seance->save();
                                $ss->available = false;
                                $rt->available = false;
                                $ss->save();
                                $rt->save();
                            }
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
                                $seance->available = $st->available;
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
    public function array_of_seances(){
        $seances=Seance::all();
        $arr=array();
        $i=0;
        foreach ($seances as $seance){
            $seancewp=new SeanceWP();
             $seancewp->day_id=$seance->day_id;
             $seancewp->day_name=$seance->day_name;
             $seancewp->timeslot_id=$seance->timeslot_id;
             $seancewp->timeslot_name=$seance->timeslot_name;
             $seancewp->room_id=$seance->room_id;
             $seancewp->room_name=$seance->room_name;
             $seancewp->cours_id=$seance->cours_id;
             $seancewp->cours_name=$seance->cours_name;
             $seancewp->set_id=$seance->set_id;
             $seancewp->set_name=$seance->set_name;
             $seancewp->type=$seance->type;
             $seancewp->available=$seance->available;
             $arr[$i]=$seancewp;
             $i++;
        }
        return $arr;
    }

}
