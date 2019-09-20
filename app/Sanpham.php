<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $fillable = [
        'id', 'loaisanpham_id', 'created_at', 'updated_at', 'title', 'slug', 'thanhphan', 'chidinh', 'lieuluong', 'chongchidinh', 'khuyencao', 'trinhbay', 'timhieuthem', 'image_id', 'seo_url', 'seo_title', 'seo_description', 'seo_keyword', 'description'
    ];

    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function loaisanpham()
    {
        return $this->belongsTo(Loaisanpham::class, 'loaisanpham_id', 'id');
    }

}
