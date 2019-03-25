<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table= 'receipts';
    protected $fillable =['receipt_id'];
    protected $primaryKey = 'receipt_id';
    public $timestamps = true;
    static public function autoNumber()
    {
        $id = 0;
        $ReceiptId = Receipt::max('receipt_id');
        if ($ReceiptId!=0) {
            $id =$ReceiptId+1;
            Receipt::insert(['receipt_id'=>$id]);
        }
        else{
            $id =1;
            Receipt::insert(['receipt_id'=>$id]);
        }
        return $id;
    }
}
