<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
            dump('test');
        }



    }
}
