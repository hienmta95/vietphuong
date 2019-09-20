<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug'
    ];

    protected $hidden = [
        //
    ];

    public function sanpham()
    {
        return $this->hasMany(Sanpham::class, 'loaisanpham_id', 'id');
    }

}
