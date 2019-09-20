<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaiquanhecodong extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug'
    ];

    protected $hidden = [
        //
    ];

    public function quanhecodong()
    {
        return $this->hasMany(Quanhecodong::class, 'loaiquanhecodong_id', 'id');
    }

}
