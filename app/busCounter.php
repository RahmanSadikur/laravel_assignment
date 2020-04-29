<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class busCounter extends Model
{
    //
    protected $table = "buscounters";
    public $timestamps = false;
    
    //const $CREATED_AT = 'create_time';
    //const $UPDATED_AT = 'updated_time';
    protected $primaryKey = "bcid";
}
