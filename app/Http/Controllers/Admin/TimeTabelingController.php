<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Day;
use App\Group;
use App\Http\Controllers\Controller;
use App\Professor;
use App\Room;
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
        $professors=Professor::all();
        $groups=Group::all();
        $days=Day::all();
        $timeslots=Timeslot::all();
        $timetabling=new TimeTabeling();
        $seances=$timetabling->cour_group();

                $timetabling->dettach_rooom_timeslots();
                $timetabling->dettach_professor_timeslots();
                $timetabling->dettach_group_timeslots();
                $timetabling->dettach_section_timeslots();
                $timetabling->dettach_cours_timeslots();
                $timetabling->intialise_rooms();
                $timetabling->intialise_professors();
                $timeslot = new Timeslot();
                $seances = $timetabling->cour_group();
                $arr = array();
                $table02 = array();
                $i = 0;
                foreach ($professors as $professor) {
                    $professor->initialise_timeslots();
                    $x = 0;
                    $bool = empty($seances);
                    while ($x < 6 && $bool == false) {
                        $timetabling = new TimeTabeling();
                        $timetabling1 = new TimeTabeling();
                        $timetabling1->professor_id = $professor->id;
                        $timetabling1->professor_name = $professor->first_name;
                        $available = $timetabling->professor_available($x, $professor);
                        if ($available == true) {
                            $timeslot = $professor->find_timeslot();
                            $timetabling1->timeslot_id = $timeslot->id;
                            $timetabling1->timeslot_name = $timeslot->name;
                            $professor->timeslots()->attach($timeslot);
                            shuffle($seances);
                            $random = 0;
                            $room = $timetabling->find_room($timeslot, $seances[$random]);
                            $timetabling1->room_id = $room->id;
                            $timetabling1->room_name = $room->code;
                            $timetabling1->attache_science_timeslot($seances[$random], $timeslot);
                            $timetabling1->section_id = $seances[$random]->section_id;
                            $timetabling1->section_name = $seances[$random]->section_name;
                            $timetabling1->section_id = $seances[$random]->group_id;
                            $timetabling1->section_name = $seances[$random]->group_name;
                            $timetabling1->cours_id = $seances[$random]->cours_id;
                            $timetabling1->cours_name = $seances[$random]->cours_name;
                            $timetabling1->type = $seances[$random]->type;
                            $x++;
                            //unset($seances[$random]);
                            $bool = empty($seances);
                            //$seances=$timetabling1->reindex_numeric($seances);
                            array_shift($seances);
                        }
                        $table02[$i] = $timetabling1;
                        $i++;

            }
        }


                    return view('admin.timetabelings.index',compact('days','timeslots','table'));
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
