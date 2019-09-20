<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitintuc extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug'
    ];

    protected $hidden = [
        //
    ];

    public function tintuc()
    {
        return $this->hasMany(Tintuc::class, 'loaitintuc_id', 'id');
    }

}
