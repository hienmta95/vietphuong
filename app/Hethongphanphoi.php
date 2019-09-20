<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hethongphanphoi extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug', 'address', 'phone', 'maps'
    ];


    protected $hidden = [
        //
    ];

}
