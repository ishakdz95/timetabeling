<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance_of_Section extends Model
{
    protected $fillable=['cours_id','cours_name','section_id',
                        'section_name','type','available'];


    public function seances_of_sections(){
        $courses=Course::all();
        $sections=section::all();
        foreach ($sections as $section)
        {
            $section_year=$section->year->name;
            foreach ($courses as $cours){
                $cours_year=$cours->year->name;
                $cours_type=$cours->type;
                if($section_year==$cours_year){
                    if($cours->type=='Cours'){
                        $section->courses()->syncWithoutDetaching($cours);
                        foreach ($section->groups as $group){
                            $group->courses()->syncWithoutDetaching($cours);
                        }
                        $seance_of_section=new Seance_of_Section();
                        $seance_of_section->cours_id=$cours->id;
                        $seance_of_section->cours_name=$cours->name;
                        $seance_of_section->section_id=$section->id;
                        $seance_of_section->section_name=$section->name;
                        $seance_of_section->type=$cours_type;
                        $seance_of_section->available=true;
                        $seance_of_section->save();
                    }
                }
            }
        }
    }
    public function delete_seance_of_section(){
        $seances_of_sections=Seance_of_Section::all();
        foreach ($seances_of_sections as $ss){
            $ss->delete();
        }
    }
}
