<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table ='students' ;
    protected $fillable = ['user_id'];
    protected $primaryKey ='student_id';
    public $timestamps =true;
}
