<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    protected $table = 'classes';
    protected $fillable = ['academic_id','level_id','shift_id','time_id','batch_id','group_id',
        'start_date','end_date','active'];
    protected $primaryKey = 'class_id';

    public $timestamps = true;
}
