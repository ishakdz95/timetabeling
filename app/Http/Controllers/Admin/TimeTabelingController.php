<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Day;
use App\Group;
use App\Http\Controllers\Controller;
use App\Professor;
use App\Room;
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

        $days=Day::all();
        $dayname=[];
        $professors=Professor::all();
        $list_professor=[];
        $tests=Professor::all();
        $list_professor=[];
        $professor_name='';
        $rooms=Room::all();
        $list_rooms=[];
        $room_code='';
        $groups=Group::all();
        $courses=Course::all();
        $list_courses=[];
        $column='';
        $room_code='';
        $dayname=[];
        $table=[];
        $timeslotname=[];
        $i=0;
        $j=0;


        foreach ($days as $day){
        $column='day: '.$day->name;

            foreach ($day->timeslots as $timeslot) {
                $p=0;
                $c=0;
                $r=0;
                $g=0;
                $bool=1;
                if (empty($list_professor)==true) {
                    foreach ($professors as $professor) {
                        $list_professor[$p] = $professor->first_name . ' ' . $professor->last_name;
                        $p++;
                    }
                }
                if(empty($list_rooms)==true){
                    foreach ($rooms as $room){
                        $list_rooms[$r]=$room->code;
                        $r++;
                    }
                }
                if (empty($list_courses)==true){
                    foreach ($courses as $cours){
                        $list_courses[$c]=$cours->name;
                        $c++;
                    }
                }
                if (empty($list_groups)==true)
                {
                    foreach ($groups as $group)
                    {
                        $list_groups[$g]=$group->name;
                        $g++;
                    }
                }

                    $column = $column . 'T: ' . $timeslot->name . ' ';
                while ($bool==1) {
                    if (empty($list_rooms) == false) {
                        $column =$column. 'R: ' . $list_rooms[0] . ' ';
                    }
                    if (empty($list_professor) == false) {
                        $column =$column. 'P: ' . $list_professor[0] . ' ';
                    }
                    if (empty($list_courses) == false) {
                        $column =$column. 'Cours: ' . $list_courses[0]. ' ';
                    }
                    if (empty($list_groups)== false){
                        $column=$column. 'Group: '.$list_groups[0]. ' ';
                    }
                    $table[$j] = $column;
                    $column = '';
                    $j++;
                    array_shift($list_courses);
                    array_shift($list_rooms);
                    array_shift($list_professor);
                    array_shift($list_groups);


                }

            }

        }
        dd($table);

        return view('admin.timetabelings.index',compact('days'));
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
