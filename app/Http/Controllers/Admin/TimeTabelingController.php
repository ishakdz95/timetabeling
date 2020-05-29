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
        $c=0;
        $g=0;

        $r=0;

        foreach ($rooms as $room)
        {
            $list_rooms[$r]=$room->code;
            $r++;
        }
        foreach ($courses as $cours){
            $list_courses[$c]=$cours->name;
            $c++;
        }
        foreach ($groups as $group){
            $list_groups[$g]=$group->name;
            $g++;
        }
        foreach ($professors as $professor){
            $t=0;
            $h=6;
                    $column='P:'.$professor->first_name.' ';
                    foreach ($days as $day){
                         foreach ($day->timeslots as $timeslot){
                            $timeslotname[$t]=$timeslot->name;
                            $t++;
                         }
                    }
                    while ($h>0)
                        {
                            $h--;

                           $booltime=1;
                           $boolroom=1;
                           $boolgroup=1;
                           $column=$column.'C: '.$list_courses[0].' ';
                           array_shift($list_courses);
                           while ($booltime==1 && empty($timeslotname)!=true){
                           $column=$column.$timeslotname[0].' ';
                           $booltime=0;
                           array_shift($timeslotname);
                            }
                            while ($boolroom==1 && empty($list_rooms)!=true){
                           $column=$column.$list_rooms[0].' ';
                           $boolroom=0;
                           array_shift($list_rooms);
                             }
                            while ($boolgroup==1 && empty($list_groups)!=true){
                                $column=$column.$list_groups[0].' ';
                                $boolgroup=0;
                                array_shift($list_rooms);
                            }
                          if ($c==$r || empty($list_rooms) ){
                            $r=0;
                            $c=0;
                            foreach ($rooms as $room)
                                {
                                $list_rooms[$r]=$room->code;
                                $r++;
                                }
                          }
                            if ( empty($list_courses) ){
                                $r=0;
                                $c=0;
                                foreach ($courses as $cours)
                                {
                                    $list_courses[$c]=$cours->name;
                                    $c++;
                                }
                            }




            }
            $table[$i]=$column;
            $i++;
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
