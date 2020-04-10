<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "users";
    public $timestamps = false;
    //const $CREATED_AT = 'create_time';
    //const $UPDATED_AT = 'updated_time';
    protected $primaryKey = "uid";
}
