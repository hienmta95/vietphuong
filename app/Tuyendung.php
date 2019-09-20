<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuyendung extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'slug', 'noidung', 'file1', 'file2', 'filename1', 'filename2', 'image_id', 'description'
    ];

    protected $hidden = [
        //
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

}
