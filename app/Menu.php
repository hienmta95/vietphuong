<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'id', 'title', 'created_at', 'updated_at', 'order', 'link', 'parent_id'
    ];

    protected $hidden = [
        //
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

}
