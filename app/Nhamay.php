<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhamay extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'type', 'address', 'phone', 'fax', 'email'
    ];


    protected $hidden = [
        //
    ];

}
