<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance_of_Td extends Model
{
    protected $fillable=['cours_id','cours_name','group_id','group_name',
        'type','available','priority','year_id','year_name'];

    public function seances_of_tds(){
        $courses=Course::all();
        $groups=Group::all();
        foreach ($groups as $group)
        {
            $year=$group->section->year->name;
            foreach ($courses as $cours){
                $cours_year=$cours->year->name;
                $cours_type=$cours->type;
                if($year==$cours_year){
                    if($cours->type=='TD'){
                        $group->courses()->syncWithoutDetaching($cours);
                        $seance_of_td=new Seance_of_Td();
                        $seance_of_td->year_id=$cours->year->id;
                        $seance_of_td->year_name=$cours->year->name;
                        $seance_of_td->cours_id=$cours->id;
                        $seance_of_td->cours_name=$cours->name;
                        $seance_of_td->group_id=$group->id;
                        $seance_of_td->group_name=$group->name;
                        $seance_of_td->type=$cours_type;
                        $seance_of_td->priority=$cours->priority;
                        $seance_of_td->available=true;
                        $seance_of_td->save();
                    }
                }
            }
        }
    }
    public function delete_seance_of_tds(){
        $seances_of_tds=Seance_of_Td::all();
        foreach ($seances_of_tds as $st){
            $st->delete();
        }
    }
}
