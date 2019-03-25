<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table= 'transactions';
    protected $fillable =['transact_date',
        'remark',
        'description',
        'paid',
        'fee_id',
        'student_id',
        'user_id',
        's_fee_id'
    ];
    protected $primaryKey = 'transact_id';
    public $timestamps = true;
}
