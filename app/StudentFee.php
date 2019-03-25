<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    protected $table= 'studentfees';
    protected $fillable =['student_id',
        'level_id',
        'fee_id',
        'amount',
        'discount'

    ];
    protected $primaryKey = 's_fee_id';
    public $timestamps = true;
}
