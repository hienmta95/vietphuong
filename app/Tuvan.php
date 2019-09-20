<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuvan extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug', 'noidung', 'image_id', 'description'
    ];

    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

}
