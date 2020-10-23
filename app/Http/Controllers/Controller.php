<?php

namespace App\Http\Controllers;

use App\Course;
use App\Day;
use App\Group;
use App\Professor;
use App\Room_Timeslot;
use App\Seance;
use App\Seance_of_group;
use App\Seance_of_Section;
use App\Seance_of_Td;
use App\Table;
use App\Timeslot;
use App\TimeTabeling;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use League\CommonMark\Extension\TaskList\TaskListItemMarker;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function new_population()
    {
        //ini_set('max_execution_time', 1800);
        $table = new Table();
        $timeslot=new Timeslot();
        $timeslot->intial_timeslots();
        $table->delete_timetabelings();
        $table->delete_fitness();
        $seance_of_section=new Seance_of_Section();
        $seance_of_td=new Seance_of_Td();
        $room_timeslot=new Room_Timeslot();
        $seance=new Seance();
        $timetabling=new TimeTabeling();
        $timetabling->dettach_timeslots();
        $room_timeslot->delete_rooms_timeslots();
        $room_timeslot->rooms_timeslots();
        $seance_of_section->delete_seance_of_section();
        $seance_of_td->delete_seance_of_tds();
        $seance_of_section->seances_of_sections();
        $seance_of_td->seances_of_tds();
        $seance->delete_seance();
        $timetabling->make_section_seance_without_professor();
        $timetabling->make_td_seance_without_professor();
        for ($i = 0; $i < 10; $i++) {
            $seance->initial_seance();
            $table->make_random_timetabeling();
        }
        $table->intial_timetabelings();

        for ($i = 0; $i < 10; $i++) {
            $arr = $table->return_one_timetabeling02();
            $fit = $table->fitness_function($arr);
            $table->change_fitness($fit, $arr);
        }
        return redirect()->route('admin.timetabelings.index');

    }
    public function best_timetabeling(){
        $table = new Table();
            //for ($j=0;$j<10;$j++){
              //  $table->intial_timetabelings();
                for($i=0;$i<5;$i++){
                    $average=$table->fitness_averege();
                    $table->delete_bad_timetabeling($average);
                    $arr01=$table->semi_chromosome();
                    $arr02=$table->semi_chromosome02();
                    $chromosome=array_merge($arr01,$arr02);
                    //$inversion_chromosome=$table->mutation($chromosome);
                    $fit = $table->fitness_function($chromosome);
                    $table->save_new_chromosome($chromosome,$fit);
                //}
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
        $timetabelings=TimeTabeling::where("fitness","=",0)->take($count)->get();
        foreach ($timetabelings as $timetabeling){
                    $arr[$j]=$timetabeling;
                    $timetabeling->available=true;
                    $timetabeling->save();
                    $j++;
        }
        $table->delete_unavailable_timetabeling();
        return redirect()->route('admin.timetabelings.index');

    }
    public function group_timetabeling(int $id){
        $groups=Group::all();
        $days=Day::all();
        $day_first=Day::first();
        $timetabelings=TimeTabeling::get()->toArray();
        $table=new Table();
       // $table->intial_timetabelings_id();
        $array=$table->order($timetabelings);
        $group_timetable=$table->return_group_timetabeling($id,$array);
        $array=$table->empty_matrice();
        //$array=$table->matrice_of_timetabelings($arr);
        $array=$table->matrice($group_timetable,$array);

        return view('admin.groups.timetabeling',compact('array','days','day_first'));
    }
    public function professor_timetabeling(int $id){
        $professors=Professor::all();
        $days=Day::all();
        $day_first=Day::first();
        $table=new Table();
        $timetabelings=TimeTabeling::get()->toArray();
        $array=$table->order($timetabelings);
        $professor_timetable=$table->return_professor_timetabeling($id,$array);
        $array=$table->empty_matrice();
        //$array=$table->matrice_of_timetabelings($arr);
        $array=$table->matrice($professor_timetable,$array);

        return view('admin.professors.timetabeling',compact('array','days','day_first'));
    }
    public function section_timetabeling(int $id){
        $professors=Professor::all();
        $days=Day::all();
        $day_first=Day::first();
        $table=new Table();
        $timetabelings=TimeTabeling::get()->toArray();
        $array=$table->order($timetabelings);
        $section_timetable=$table->return_section_timetabeling($id,$array);
        $array=$table->empty_matrice();
        //$array=$table->matrice_of_timetabelings($arr);
        $array=$table->matrice($section_timetable,$array);
        return view('admin.sections.timetabeling',compact('array','days','day_first'));
    }
    public function professor_courses(int $id){
        $professor=Professor::find($id);
        $courses=Course::all();
        return view('admin.professors.professor_courses',compact('professor','courses'));
    }
    public function attache_professor_course(Request $request){

        $professor=Professor::find($request->id);
        $course=Course::find($request->course_id);
        if ($request->button_1=="attach"){
            $professor->courses()->syncWithoutDetaching($course);
        }
        else
        {
            $professor->courses()->detach($course);
        }
        $courses=Course::all();
        return view('admin.professors.professor_courses',compact('professor','courses'));
    }
    public function detache_professor_course(Request $request){
        $professor=Professor::find($request->id);
        $course=Course::find($request->course_id);
        $professor->courses()->syncWithoutDetaching($course);
        $courses=Course::all();
        return view('admin.professors.professor_courses',compact('professor','courses'));
    }
}
