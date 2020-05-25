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
    public function groups(){
        return $this->hasMany(Group::class);
    }
}
