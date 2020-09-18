<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Table extends Model
{
    public function make_random_timetabeling(){

        $timetabling=new TimeTabeling();
        $timetabling->intial_professor_hour();
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
        $seances=$timetabling->array_of_seances();
        $count=count($seances);
        $table=new Table();
        while ($seances!=null) {
                try {
                    $professor=$timetabling->random_professor();
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
                    $timetabling->available = $seances[0]->available;
                    $timetabling->fitness=1;
                    $timetabling->save();
                    array_shift($seances);
                }
                catch (\Exception $e) {
                    return 'catch';
                }
        }

    }
    public function delete_timetabelings(){
        $timetabelings=TimeTabeling::all();
        foreach ($timetabelings as $timeTabeling){
            $timeTabeling->delete();
        }
    }
    public function return_one_timetabeling(){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::all();
        $arr=array();
        $i=0;
            foreach ($timetabelings as $timetabling){
                if ($cont>0 && $timetabling->available==true){
                    $tt= new TimeTabeling();
                    $tt=$timetabling;
                    $timetabling->available=false;
                    $timetabling->save();
                    $cont--;
                    $arr[$i]=$tt;
                    $i++;
                }
            }
            return $arr;
    }

    public function fitness_function(array $array){
        $i=0;
            foreach ($array as $item){
                $item_id=$item->id;
                foreach ($array as $value){
                    $value_id=$value->id;
                    if ($item->professor_id==$value->professor_id && $item->timeslot_id==$value->timeslot_id && $item_id!=$value_id ){
                        $i++;
                    }
                }

            }
        $fitness=new Fitness();
        $fitness->fitness=$i;
        $fitness->save();
        return($i);
    }
    public function delete_fitness(){
        $fitness=Fitness::all();
        foreach ($fitness as $item){
            $item->delete();
        }
    }
    public function change_fitness(int $fit,array $arr){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::all();
        foreach ($arr as $item) {
        foreach ($timetabelings as $timetabling){
            if ($cont>0 && $timetabling->id==$item->id ){
                $timetabling->fitness=$fit;
                $timetabling->save();
                $cont--;
            }
        }
        }
    }
    public function fitness_averege(){
        $fitnesses=Fitness::all();
        $average=0;
        $i=0;
        foreach ($fitnesses as $fitness){
            $average=$average+$fitness->fitness;
            $i++;
        }
        $average=$average/$i;
        return $average;
    }
    public function delete_bad_timetabeling(int $average){
      $timetabelings=TimeTabeling::all();
      foreach ($timetabelings as $timetabeling){
          if (($timetabeling->fitness)>$average){
              $timetabeling->delete();
          }
      }
    }
    public function crossing(array $arr1,array $arr2){
        $timetabelings=TimeTabeling::all();
        $table=new Table();
        $table->intial_available_of_timetabeling();
        $array01=$table->semi_chromosome($arr1);
        $array02=$table->semi_chromosome02($arr2);
        //$array03=$table->chromosome();


    }
    public function intial_available_of_timetabeling(){
        $timetabelings=TimeTabeling::all();
        foreach ($timetabelings as $timetabeling){
            $timetabeling->available=true;
            $timetabeling->save();
        }
    }
    public function semi_chromosome(){
        $table=new Table();
        $seances=Seance::all();
        $count=count($seances);
        $array01 = $table->return_one_timetabeling();
        $array02=array();
        $i=0;
        foreach ($array01 as $item){
            if ($i<$count/2){
                $array02[$i]=$item;
                $i++;
            }
        }
        return $array02;
    }
    public function semi_chromosome02()
    {
        $table = new Table();
        $seances = Seance::all();
        $count = count($seances);
        $array01 = $table->return_one_timetabeling();
        $array02 = array();
        $i = 0;
        foreach ($array01 as $item) {
            if ($i >= $count / 2) {
                $array02[$i] = $item;
            }
            $i++;
        }
        return $array02;
    }
    public function chromosome(){
        $table=new Table();
        $array01=$table->return_one_timetabeling();
        $array02=array();
        $i=0;
        foreach ($array01 as $item){
                $professor=new Professor();
                $professor->id1=$item->professor_id;
                $professor->first_name1=$item->professor_first_name;
                $professor->last_name1=$item->professor_last_name;
                $array02[$i]=$professor;
            $i++;
        }
        return $array02;
    }
    public function matrice_of_timetabelings(){
        $seances=Seance::all();
        $count=count($seances);
        $timetabelings=TimeTabeling::all();
        $i=0;
        $j=0;
        foreach ($timetabelings as $timetabeling){
                $arr[$i][$j]=$timetabeling;
                $j++;
                $count--;
                if ($count==0){
                    $count=count($seances);
                    $i++;
                    $j=0;
                }
        }
       return $arr;
    }

public function intial_timetabelings(){
        $timetabelings=TimeTabeling::all();
        $i=1;
        foreach ($timetabelings as $timetabeling){
            $timetabeling->id=$i;
            $timetabeling->available=true;
            $timetabeling->save();
            $i++;
        }
}
public function save_new_chromosome(array $arr,int $fitness){
        foreach ($arr as $item){
           $timetabling=new TimeTabeling();
            $timetabling->day_id = $item->day_id;
            $timetabling->day_name = $item->day_name;
            $timetabling->timeslot_id = $item->timeslot_id;
            $timetabling->timeslot_name = $item->timeslot_name;
            $timetabling->room_id = $item->room_id;
            $timetabling->room_name = $item->room_name;
            $timetabling->professor_id = $item->id;
            $timetabling->professor_first_name = $item->professor_first_name;
            $timetabling->professor_last_name = $item->professor_last_name;
            $timetabling->cours_id = $item->cours_id;
            $timetabling->cours_name = $item->cours_name;
            $timetabling->set_id = $item->set_id;
            $timetabling->set_name = $item->set_name;
            $timetabling->type = $item->type;
            $timetabling->available = $item->available;
            $timetabling->fitness=$fitness;
            $timetabling->save();
        }

}

}
