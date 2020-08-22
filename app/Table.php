<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function test(){

        $timetabling=new TimeTabeling();
        $timetabling->dettach_rooom_timeslots();
        $timetabling->dettach_professor_timeslots();
        $timetabling->dettach_group_timeslots();
        $timetabling->dettach_section_timeslots();
        $timetabling->dettach_cours_timeslots();
        $timetabling->delete_rooms_timeslots();
        //$timetabling->intialise_rooms();
        //$timetabling->intialise_professors();
        $seance_of_section=new Seance_of_Section();
        $seance_of_td=new Seance_of_Td();
        $room_timeslot=new Room_Timeslot();
        $seance_of_section->delete_seance_of_section();
        $seance_of_section->seances_of_sections();
        $seance_of_td->delete_seance_of_tds();
        $seance_of_td->seances_of_tds();
        $room_timeslot->delete_rooms_timeslots();
        $room_timeslot->rooms_timeslots();
        $timetabling->delete_seance();
        $timetabling->make_section_seance_without_professor();
        $timetabling->make_td_seance_without_professor();

    }

}
