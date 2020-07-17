<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\Http\Controllers\Controller;
use App\Timeslot;
use Illuminate\Http\Request;


class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots=Timeslot::all();
        return view('admin.timeslots.index',compact('timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days=Day::all();

        return view('admin.timeslots.create',compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $data = new Timeslot([
                'day_id'=>$request->get('day_id'),
                'name'=>$request->get('name'),
                'available'=>$request->get('available'),
            ]);
            $data->save();
        /*Timeslot::create($request->all());*/
        return redirect()->route('admin.timeslots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeslot $timeslot)
    {
       $days=Day::all();
        return view('admin.timeslots.edit',compact('timeslot','days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeslot $timeslot)
    {
        $timeslot->update($request->all());
        return redirect()->route('admin.timeslots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeslot $timeslot)
    {
        $timeslot->delete();
        return redirect()->route('admin.timeslots.index');

    }
}
