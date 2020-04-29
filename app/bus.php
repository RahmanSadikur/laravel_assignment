<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    //
    protected $table = "busses";
    public $timestamps = false;
    
    //const $CREATED_AT = 'create_time';
    //const $UPDATED_AT = 'updated_time';
    protected $primaryKey = "bid";
}
