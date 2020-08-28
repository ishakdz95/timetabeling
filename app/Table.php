<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Table extends Model
{
    public function make_random_timetabeling(){
        $timetabling=new TimeTabeling();
        $professor=new Professor();
        $timetabling->dettach_timeslots();
        $seance_of_section=new Seance_of_Section();
        $seance_of_td=new Seance_of_Td();
        $room_timeslot=new Room_Timeslot();
        $room_timeslot->delete_rooms_timeslots();
        $seance_of_section->delete_seance_of_section();
        $seance_of_td->delete_seance_of_tds();
        $room_timeslot->rooms_timeslots();
        $seance_of_section->seances_of_sections();
        $seance_of_td->seances_of_tds();
        $timetabling->delete_seance();
        $timetabling->make_section_seance_without_professor();
        $timetabling->make_td_seance_without_professor();
        $professor->intial_professor();
        $professors=Professor::all();
        $seances=$timetabling->array_of_seances();
        foreach ($professors as $professor) {
            $hour=$professor->hour;
            while ($hour>0){
                try {
                    $timetabling = new TimeTabeling();
                    $timetabling->day_id = $seances[0]->day_id;
                    $timetabling->day_name = $seances[0]->day_name;
                    $timetabling->timeslot_id = $seances[0]->timeslot_id;
                    $timetabling->timeslot_name = $seances[0]->timeslot_name;
                    $timetabling->room_id = $seances[0]->room_id;
                    $timetabling->room_name = $seances[0]->room_name;
                    $timetabling->professor_id = $professor->id;
                    $timetabling->professor_first_name = $professor->first_name;
                    $timetabling->professor_last_name = $professor->last_name;
                    $timetabling->cours_id = $seances[0]->cours_id;
                    $timetabling->cours_name = $seances[0]->cours_name;
                    $timetabling->set_id = $seances[0]->set_id;
                    $timetabling->set_name = $seances[0]->set_name;
                    $timetabling->type = $seances[0]->type;
                    $timetabling->save();
                    array_shift($seances);
                    shuffle($seances);
                    $hour--;
                }
                catch (\Exception $e) {
                    return 'catch';
                }

            }


        }

    }
    public function delete_timetabelings(){
        $timetabelings=TimeTabeling::all();
        foreach ($timetabelings as $timeTabeling){
            $timeTabeling->delete();
        }
    }
    public function delete_timetabelings_saves(){
        $timetabelings=TimetabelingSave::all();
        foreach ($timetabelings as $timeTabeling){
            $timeTabeling->delete();
        }
    }
    public function return_one_timetabeling(){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::all();
        $timetabelings_save=TimetabelingSave::all();
        $contTimetabeling=count($timetabelings);
        $contTimetabelingSave=count($timetabelings_save);
        $arr=array();
        $i=0;
        if ($contTimetabeling>0){
            foreach ($timetabelings as $timetabling){
                if ($cont>0){
                    $tt= new TimeTabeling();
                    $tt=$timetabling;
                    $cont--;
                    $arr[$i]=$tt;
                    $i++;
                }
            }
            return $arr;
        }
        else{
            foreach ($timetabelings_save as $timetabling_save){
                if ($cont>0){
                    $tt= new TimetabelingSave();
                    $tt=$timetabling_save;
                    $cont--;
                    $arr[$i]=$tt;
                    $i++;
                }
            }
            return $arr;
        }

    }
    public function delete_one_timetabeling(){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::all();
        foreach ($timetabelings as $timetabling){
            if ($cont>0){
                $timetabling->delete();
                $cont--;
            }
        }
    }
    public function transfer_one_timetabeling(array $arr){
        foreach ($arr as $item){
            $timetabling=new TimetabelingSave();
            $timetabling->day_id = $item->day_id;
            $timetabling->day_name = $item->day_name;
            $timetabling->timeslot_id = $item->timeslot_id;
            $timetabling->timeslot_name = $item->timeslot_name;
            $timetabling->room_id = $item->room_id;
            $timetabling->room_name = $item->room_name;
            $timetabling->professor_id = $item->professor_id;
            $timetabling->professor_first_name = $item->professor_first_name;
            $timetabling->professor_last_name = $item->professor_last_name;
            $timetabling->cours_id = $item->cours_id;
            $timetabling->cours_name = $item->cours_name;
            $timetabling->set_id =$item->set_id;
            $timetabling->set_name = $item->set_name;
            $timetabling->type = $item->type;
            $timetabling->save();
        }
    }
    public function fitness_function(array $arr){
        $i=0;
            foreach ($arr as $item){
                foreach ($arr as $value)
                if ($item->professor_id==$value->professor_id && $item->timeslot_id==$value->timeslot_id &&$item->id=!$value->id && $item->id=!$value->id){
                    $i++;

                }
            }
        $fitness=new Fitness();
        $fitness->fitness=$i;
        $fitness->save();
    }
    public function delete_fitness(){
        $fitness=Fitness::all();
        foreach ($fitness as $item){
            $item->delete();
        }
    }
    public function crossing(){
        $timetabelings=TimeTabeling::all();
        $timetabelings_save=TimetabelingSave::all();
        $seances=Seance::all();
        $count=count($seances);

    }


}
