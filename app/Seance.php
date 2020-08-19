<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
use PhpParser\Builder\Class_;

class Seance extends Model
{
    public $cours_id=0;
    public $cours_name='';
    public $group_id=0;
    public $group_name='';
    public $section_id=0;
    public $section_name='';
    public $type='';
}
