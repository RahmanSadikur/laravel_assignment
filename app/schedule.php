<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    //
    protected $table = "schedules";
    public $timestamps = false;
    
    //const $CREATED_AT = 'create_time';
    //const $UPDATED_AT = 'updated_time';
    protected $primaryKey = "sid";
}
