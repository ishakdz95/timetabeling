<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Table extends Model
{
    public function make_random_timetabeling(){
        $timetabling=new TimeTabeling();
        $Seance=new Seance();
        $Professor=new Professor();
        $Course=new Course();
        $timetabling->intial_professor_hour();
        $timetabling->dettach_professor_timeslots();
        $seances=Seance::all();
        $count=count($seances);
        while ($count>0) {
                try {
                    $seance=$Seance->getSeance();
                    $course= $Course->getCourse($seance);
                    $professor=$Professor->random_professor04($course);
                        $timetabling = new TimeTabeling();
                        $timetabling->day_id = $seance->day_id;
                        $timetabling->day_name = $seance->day_name;
                        $timetabling->timeslot_id = $seance->timeslot_id;
                        $timetabling->timeslot_name = $seance->timeslot_name;
                        $timetabling->room_id = $seance->room_id;
                        $timetabling->room_name = $seance->room_name;
                        $timetabling->professor_id = $professor->id;
                        $timetabling->professor_first_name = $professor->first_name;
                        $timetabling->professor_last_name = $professor->last_name;
                        $timetabling->cours_id = $seance->cours_id;
                        $timetabling->cours_name = $seance->cours_name;
                        $timetabling->set_id = $seance->set_id;
                        $timetabling->set_name = $seance->set_name;
                        $timetabling->type = $seance->type;
                        $timetabling->available = $seance->available;
                        $timetabling->fitness=1;
                        $professor->hour = $professor->hour - 1;
                        $professor->save();
                        $timetabling->save();
                        $count--;
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
    public function return_one_timetabeling02(){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::all();
        $timetabelings=TimeTabeling::where("available","=",true)->get();
        $arr=array();
        $i=0;
        foreach ($timetabelings as $timetabling){
            if ($cont>1){
                $tt=$timetabling;
                $timetabling->available=false;
                $timetabling->save();
                $arr[$i]=$tt;
                $i++;
                $cont--;
            }

        }
        return $arr;
    }
    public function return_one_timetabeling(){
        $seances=Seance::all();
        $cont=count($seances);
        $timetabelings=TimeTabeling::where("already_crossing","=",true)->get();
        $arr=array();
        $i=0;
            foreach ($timetabelings as $timetabling){
                if ($cont>0){
                    $tt=new TimeTabeling();
                    $tt->day_id = $timetabling->day_id;
                    $tt->day_name = $timetabling->day_name;
                    $tt->timeslot_id = $timetabling->timeslot_id;
                    $tt->timeslot_name = $timetabling->timeslot_name;
                    $tt->room_id = $timetabling->room_id;
                    $tt->room_name = $timetabling->room_name;
                    $tt->professor_id = $timetabling->professor_id;
                    $tt->professor_first_name = $timetabling->professor_first_name;
                    $tt->professor_last_name = $timetabling->professor_last_name;
                    $tt->cours_id = $timetabling->cours_id;
                    $tt->cours_name = $timetabling->cours_name;
                    $tt->set_id = $timetabling->set_id;
                    $tt->set_name = $timetabling->set_name;
                    $tt->type = $timetabling->type;
                    $tt->available = $timetabling->available;
                    $tt->fitness=$timetabling->fitness;
                    $tt->already_crossing=$timetabling->already_crossing;
                    $arr[$i]=$tt;
                    $timetabling->already_crossing=false;
                    $timetabling->save();
                    $i++;
                    $cont--;
                }

            }
            return $arr ;
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
        if (($timetabeling->fitness)>$average && $average>0){
            $timetabeling->delete();
        }
    }
}
    public function delete_bad_fitnesses(int $average){
        $timetabelings=TimeTabeling::all();
        $fitnesses=Fitness::all();
        foreach ($fitnesses as $fitness){
            if ($fitness->fitness>$average ){
                $fitness->delete();
            }
        }
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
        $array01 = $table->return_one_timetabeling();
        $count=count($array01);
        $average=intdiv($count,2);
        //$array01 = $table->return_one_timetabeling();
        $array02=array();
        $j=0;
        for($i=0;$i<=$average;$i++){
            $array02[$j] = $array01[$i];
            $j++;
        }
        return $array02;
    }
    public function semi_chromosome02()
    {
        $table = new Table();
        //$seances = Seance::all();
        $array01 = $table->return_one_timetabeling();
        $count = count($array01);
        $average=intdiv($count,2);

        $array02 = array();
        $j = 0;
        for($i=$average+1;$i<$count;$i++){
            $array02[$j] = $array01[$i];
            $j++;
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
    public function mutation(array $chromosome){
        $table=new Table();
        $bool=true;
        $array02=array();
        $i=0;
            $count=count($chromosome);
            $rand01=rand(0,$count-1);
            $rand02=rand(0,$count-1);
            $gene01=$this->gene($chromosome,$rand01);
            $gene02=$this->gene($chromosome,$rand02);
            if ($gene01->type==$gene02->type){
                $chromosome[$rand01]->cours_id=$gene02->cours_id;
                $chromosome[$rand01]->cours_name=$gene02->cours_name;
                $chromosome[$rand01]->set_id=$gene02->set_id;
                $chromosome[$rand01]->set_name=$gene02->set_name;
                $chromosome[$rand01]->professor_id=$gene02->professor_id;
                $chromosome[$rand01]->professor_first_name=$gene02->professor_first_name;
                $chromosome[$rand01]->professor_last_name=$gene02->professor_last_name;
                $chromosome[$rand02]->cours_id=$gene01->cours_id;
                $chromosome[$rand02]->cours_name=$gene01->cours_name;
                $chromosome[$rand02]->set_id=$gene01->set_id;
                $chromosome[$rand02]->set_name=$gene01->set_name;
                $chromosome[$rand02]->professor_id=$gene01->professor_id;
                $chromosome[$rand02]->professor_first_name=$gene01->professor_first_name;
                $chromosome[$rand02]->professor_last_name=$gene01->professor_last_name;
            }
        return $chromosome;
    }

    public function matrice(array $timetable,array $array){
        $days=Day::all();
        $group_timetable=$array;
        $i=1;
        foreach ($array as $item){
            $j=1;
            foreach ($item as $v){
                foreach ($timetable as $value){
                    if ($value->day_name==$v->day_name && $value->timeslot_name==$v->timeslot_name){
                        $group_timetable[$i][$j]=$value;
                    }
                }
                $j++;
            }
            $i++;
        }
        return $group_timetable;
    }
    public function empty_matrice(){
        $i=1;
        $days=Day::all();
        $array=array();
        foreach ($days as $day){
            $j=1;
            foreach ($day->timeslots as $timeslot){
                        $timetabling = new TimeTabeling();
                        $timetabling->day_id = $day->id;
                        $timetabling->day_name = $day->name;
                        $timetabling->timeslot_id =$timeslot->id;
                        $timetabling->timeslot_name =$timeslot->name;
                        $timetabling->room_id = "";
                        $timetabling->room_name ="";
                        $timetabling->professor_id ="";
                        $timetabling->professor_first_name = "";
                        $timetabling->professor_last_name = "";
                        $timetabling->cours_id = "";
                        $timetabling->cours_name = "";
                        $timetabling->set_id = "";
                        $timetabling->set_name ="";
                        $timetabling->type = "";
                        $timetabling->available ="";
                        $timetabling->fitness="";
                        $array[$i][$j]=$timetabling;
                $j++;
                    }
            $i++;
            }

        return $array;
    }
    public function order(Array $arr){
        $timeslot_id = array_column($arr, 'timeslot_id');
        array_multisort($timeslot_id, SORT_ASC, $arr);
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
    public function intial_one_timetabelings(){
        $timetabelings=TimeTabeling::all();
        $seances=Seance::all();
        $count=count($seances);
        foreach ($timetabelings as $timetabeling){
                if ($timetabeling->available==false && $count>1){
                    $timetabeling->available=true;
                    $timetabeling->save();
                    $count--;
                }
        }
    }
    public function intial_timetabelings_id(){
        $timetabelings=TimeTabeling::all();
        $i=1;
        foreach ($timetabelings as $timetabeling){
                $timetabeling->id=$i;
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
            $timetabling->professor_id = $item->professor_id;
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
public function return_best_timetabeling(){
        $timetabelings=TimeTabeling::all();
        $seances=Seance::all();
        $count=count($seances);
        $j=0;
        foreach ($timetabelings as $timetabeling){
               // $i=$timetabeling->id-1;
                    $arr[$j]=$timetabeling;
                    $j++;
                return $arr;
            }
}
public function make_available_false(){
    $timetabelings=TimeTabeling::all();
    $i=1;
    foreach ($timetabelings as $timetabeling){
        $timetabeling->id=$i;
        $timetabeling->available=false;
        $timetabeling->save();
        $i++;
    }
}
public function delete_unavailable_timetabeling(){
        $timetabelings=TimeTabeling::all();
        foreach ($timetabelings as $timeTabeling){
            if ($timeTabeling->available==false){
                $timeTabeling->delete();
            }
        }
}
    public function return_group_timetabeling(int $group_id,array $arr){
        $groups=Group::all();
        $array=[];
        $i=0;

        foreach ($arr as $item){
            $seance_of_group=new Seance_of_group();
            if ($item["type"]=='Cours'){
                if($groups->find($group_id)->section->id==$item["set_id"]){
                   $seance_of_group->day_id=$item["day_id"];
                   $seance_of_group->day_name=$item["day_name"];
                    $seance_of_group->timeslot_id=$item["timeslot_id"];
                    $seance_of_group->timeslot_name=$item["timeslot_name"];
                    $seance_of_group->professor_id=$item["professor_id"];
                    $seance_of_group->professor_first_name=$item["professor_first_name"];
                    $seance_of_group->professor_last_name=$item["professor_last_name"];
                    $seance_of_group->section_id=$item["set_id"];
                    $seance_of_group->section_name=$item["set_name"];
                    $seance_of_group->cours_id=$item["cours_id"];
                    $seance_of_group->cours_name=$item["cours_name"];
                    $seance_of_group->room_id=$item["room_id"];
                    $seance_of_group->room_name=$item["room_name"];
                    $seance_of_group->type=$item["type"];
                    $array[$i]=$seance_of_group;
                    $i++;
                }
            }
            else{
                if ($group_id==$item["set_id"]){
                    $seance_of_group->day_id=$item["day_id"];
                    $seance_of_group->day_name=$item["day_name"];
                    $seance_of_group->timeslot_id=$item["timeslot_id"];
                    $seance_of_group->timeslot_name=$item["timeslot_name"];
                    $seance_of_group->professor_id=$item["professor_id"];
                    $seance_of_group->professor_first_name=$item["professor_first_name"];
                    $seance_of_group->professor_last_name=$item["professor_last_name"];
                    $seance_of_group->section_id=$item["set_id"];
                    $seance_of_group->section_name=$item["set_name"];
                    $seance_of_group->cours_id=$item["cours_id"];
                    $seance_of_group->cours_name=$item["cours_name"];
                    $seance_of_group->room_id=$item["room_id"];
                    $seance_of_group->room_name=$item["room_name"];
                    $seance_of_group->type=$item["type"];
                    $array[$i]=$seance_of_group;
                    $i++;
                }
            }

        }
        return $array;
    }
    public function professor_course(Professor $professor,Course $course){

        return $professor->courses->contains($course);

    }
    public function return_professor_timetabeling(int $professor_id,array $arr)
    {
        $professors = Professor::all();
        $array = [];
        $i = 0;
        foreach ($arr as $item) {
            $seance_of_professor = new SeanceWP();
            if ($item["professor_id"]== $professor_id) {
                $seance_of_professor->day_id = $item["day_id"];
                $seance_of_professor->day_name = $item["day_name"];
                $seance_of_professor->timeslot_id = $item["timeslot_id"];
                $seance_of_professor->timeslot_name = $item["timeslot_name"];
                $seance_of_professor->set_id = $item["set_id"];
                $seance_of_professor->set_name = $item["set_name"];
                $seance_of_professor->cours_id = $item["cours_id"];
                $seance_of_professor->cours_name = $item["cours_name"];
                $seance_of_professor->room_id = $item["room_id"];
                $seance_of_professor->room_name = $item["room_name"];
                $seance_of_professor->type = $item["type"];
                $array[$i] = $seance_of_professor;
                $i++;
            }
        }
        return $array;
    }
    public function return_section_timetabeling(int $section_id,array $arr)
    {
        $sections = Section::all();
        $array = [];
        $i = 0;
        foreach ($arr as $item) {
            $seance_of_group = new Seance_of_group();
            if ($item["type"]=="Cours"){
            if ($item["set_id"] == $section_id) {
                    $seance_of_group->day_id=$item["day_id"];
                    $seance_of_group->day_name=$item["day_name"];
                    $seance_of_group->timeslot_id=$item["timeslot_id"];
                    $seance_of_group->timeslot_name=$item["timeslot_name"];
                    $seance_of_group->professor_id=$item["professor_id"];
                    $seance_of_group->professor_first_name=$item["professor_first_name"];
                    $seance_of_group->professor_last_name=$item["professor_last_name"];
                    $seance_of_group->section_id=$item["set_id"];
                    $seance_of_group->section_name=$item["set_name"];
                    $seance_of_group->cours_id=$item["cours_id"];
                    $seance_of_group->cours_name=$item["cours_name"];
                    $seance_of_group->room_id=$item["room_id"];
                    $seance_of_group->room_name=$item["room_name"];
                    $seance_of_group->type=$item["type"];
                    $array[$i]=$seance_of_group;
                    $i++;
                }

            }
        }
        return $array;
    }
    public function gene(array $chromosome,int $rand){
        $gene01=$chromosome[$rand];
        $gene=new Gene();
        $gene->cours_id=$gene01->cours_id;
        $gene->cours_name=$gene01->cours_name;
        $gene->set_id=$gene01->set_id;
        $gene->set_name=$gene01->set_name;
        $gene->professor_id=$gene01->professor_id;
        $gene->professor_first_name=$gene01->professor_first_name;
        $gene->professor_last_name=$gene01->professor_last_name;
        $gene->type=$gene01->type;
        return $gene;

    }
}
