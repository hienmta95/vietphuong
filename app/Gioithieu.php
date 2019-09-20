<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gioithieu extends Model
{
    protected $fillable = [
        'id', 'title1', 'title2', 'created_at', 'updated_at', 'order', 'slug', 'noidung', 'image_id', 'description'
    ];

    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

}
