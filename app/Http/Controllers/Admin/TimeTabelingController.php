<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Day;
use App\Fitness;
use App\Group;
use App\Http\Controllers\Controller;
use App\Professor;
use App\Room;
use App\Table;
use App\Timeslot;
use App\TimeTabeling;
use Illuminate\Http\Request;


class TimeTabelingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table=new Table();
        $table->delete_timetabelings();
        $table->delete_fitness();
        for($i=0;$i<10;$i++){
            $table->make_random_timetabeling();
        }

        for($i=0;$i<10;$i++){
            $arr=$table->return_one_timetabeling();
            $fit=$table->fitness_function($arr);
            $table->change_fitness($fit,$arr);
        }
        $average=$table->fitness_averege();
        $table->delete_bad_timetabeling($average);
        $timetabelings=$table->matrice_of_timetabelings();
        $table->crossing($timetabelings[0],$timetabelings[1]);
                    return view('admin.timetabelings.index',compact('arr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeTabeling  $timeTabeling
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTabeling $timeTabeling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeTabeling  $timeTabeling
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTabeling $timeTabeling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeTabeling  $timeTabeling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeTabeling $timeTabeling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeTabeling  $timeTabeling
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTabeling $timeTabeling)
    {
        //
    }
}
