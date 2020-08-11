<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable=['name','year_id'];
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
}
