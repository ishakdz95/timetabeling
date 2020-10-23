<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_Timeslot extends Model
{
    protected $fillable=['day_id','day_name','timeslot_id',
        'timeslot_name','room_id','room_name','type','available'];

    public function rooms_timeslots(){
        $rooms=Room::all();
        $timeslots=Timeslot::all();
        $rooms_timeslots=array();
        $i=0;
        foreach ($timeslots as $timeslot){
            foreach ($rooms as $room){
                $room->timeslots()->attach($timeslot);
                $room_timeslot=new Room_Timeslot();
                $room_timeslot->day_id=$timeslot->day->id;
                $room_timeslot->day_name=$timeslot->day->name;
                $room_timeslot->timeslot_id=$timeslot->id;
                $room_timeslot->timeslot_name=$timeslot->name;
                $room_timeslot->room_id=$room->id;
                $room_timeslot->room_name=$room->code;
                $room_timeslot->type=$room->type;
                $room_timeslot->available=true;
                $room_timeslot->save();
            }
        }
    }

    public function delete_rooms_timeslots(){
        $rooms_timeslots=Room_Timeslot::all();
        foreach ($rooms_timeslots as $rt){
            $rt->delete();
        }
    }
    public function get_random_room_timeslot($type){
        $rooms_timeslots=Room_Timeslot::where("available","=",true)->where("type","=",$type)->get();
        $count=count($rooms_timeslots);
        $rand=rand(0,$count);
        $room_timeslot=$rooms_timeslots[$rand];
        $room_timeslot->available=false;
        $room_timeslot->save();
        return $room_timeslot;
    }

}
