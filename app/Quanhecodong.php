<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quanhecodong extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'image_id', 'slug', 'noidung', 'loaiquanhecodong_id', 'description', 'file1'
    ];


    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function loaiquanhecodong()
    {
        return $this->belongsTo(Loaiquanhecodong::class, 'loaiquanhecodong_id', 'id');
    }

}
