<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable=[
        'name'

    ];
    public function courses(){
        return $this->hasMany(Course::class);
    }
    public function sections(){
        return $this->hasMany(Section::class);
    }
    public function getYear(int $year_id){
        $year=Year::find($year_id);
        return $year;
    }

}
