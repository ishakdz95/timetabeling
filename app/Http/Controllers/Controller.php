<?php

namespace App\Http\Controllers;

use App\Group;
use App\Seance;
use App\Seance_of_group;
use App\Table;
use App\TimeTabeling;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use League\CommonMark\Extension\TaskList\TaskListItemMarker;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function new_population()
    {
        $table = new Table();

        $table->delete_timetabelings();
        $table->delete_fitness();
        for ($i = 0; $i < 10; $i++) {
            $table->make_random_timetabeling();
        }

        for ($i = 0; $i < 10; $i++) {
            $arr = $table->return_one_timetabeling();
            $fit = $table->fitness_function($arr);
            $table->change_fitness($fit, $arr);
        }
        return redirect()->route('admin.timetabelings.index');

    }
    public function best_timetabeling(){
        $table = new Table();
        for ($j=0;$j<10;$j++){
            $table->intial_timetabelings();
            for($i=0;$i<10;$i++){
                $average=$table->fitness_averege();
                $table->delete_bad_timetabeling($average);

                $arr01=$table->semi_chromosome();
                $arr02=$table->semi_chromosome02();
                $chromosome=array_merge($arr01,$arr02);
                $fit = $table->fitness_function($chromosome);
                $table->save_new_chromosome($chromosome,$fit);
            }
        }
        return redirect()->route('admin.timetabelings.index');
    }
    public function final_timetabeling(){
        $timetabelings=TimeTabeling::all();
        $seances=Seance::all();
        $count=count($seances);
        $arr=[];
        $j=0;
        $table=new Table();
        $table->make_available_false();
        foreach ($timetabelings as $timetabeling){
            if ($timetabeling->fitness==0){
                $i=$timetabeling->id-1;
                while($count>0){
                    $arr[$j]=$timetabelings[$i];
                    $timetabelings[$i]->available=true;
                    $timetabelings[$i]->save();
                    $i++;
                    $j++;
                    $count--;
                }

            }
        }


    }
    public function group_timetabeling(int $id){
        $groups=Group::all();
        $table=new Table();
        $table->delete_unavailable_timetabeling();
        $arr=$table->return_best_timetabeling();
        $array=$table->order($arr);
        $arr=$table->return_group_timetabeling($id,$array);

        return view('admin.groups.timetabeling',compact('arr'));
    }
}
