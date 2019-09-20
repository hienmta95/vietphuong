<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'image_id', 'slug', 'description', 'noidung', 'link', 'loaitintuc_id', 'seo_url', 'seo_title', 'seo_description', 'seo_keyword'
    ];


    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function loaitintuc()
    {
        return $this->belongsTo(Loaitintuc::class, 'loaitintuc_id', 'id');
    }

}
