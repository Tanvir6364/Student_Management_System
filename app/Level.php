<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table ='levels' ;
    protected $fillable = ['program_id','level','description'];

    protected $primaryKey ='level_id';
    public $timestamps =true;
}
