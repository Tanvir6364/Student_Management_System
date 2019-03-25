<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    protected $table= 'receiptdetails';
    protected $fillable =['receipt_id',
        'transact_id',
        'student_id'
    ];
    protected $primaryKey = 'receiptdetail_id';
    public $timestamps = true;
}
