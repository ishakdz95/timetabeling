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
        $timetabling=new TimeTabeling();
        $professors=Professor::all();
        $groups=Group::all();
        $days=Day::all();
        $timeslots=Timeslot::all();
        $timetabling->dettach_rooom_timeslots();
        $timetabling->dettach_professor_timeslots();
        $timetabling->intialise_rooms();
        $timetabling->intialise_professors();
        $timeslot=new Timeslot();
        $seances=$timetabling->cour_group();


        $i=0;
        foreach ($professors as $professor){
            $hours=0;
            $professor->initialise_timeslots();
            $x=0;
            while ( $x <6 && $seances!=null) {
                $available=$timetabling->professor_available($hours,$professor);
                if($available==true){

                    $timeslot=$professor->find_timeslot();
                    $professor->timeslots()->attach($timeslot);
                    $room=$timetabling->find_room($timeslot);
                    $timetabling->attach_cours_timeslot($seances[0]->cours_id,$timeslot);
                    $timetabling->attach_groups_timeslot($seances[0]->group_id,$timeslot);
                    //dd($seances[0]->group_id);
                    dd($groups->find($seances[0]->group_id)->name);
                            $professor_group_cours=$professor->first_name.' '.$timeslot->name.''.$room->code;
                            $table[$i]=$professor_group_cours;
                            $i++;
                            $hours++;
                            array_shift($seances);
                            $x++;
                }
            }
        }

        return view('admin.timetabelings.index',compact('days','timeslots'));
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
