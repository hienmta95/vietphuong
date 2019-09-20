<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'id', 'phone', 'created_at', 'updated_at',
        'tencongty', 'emailcongty', 'diachicongty', 'sdtcongty', 'facebook', 'youtube', 'logo', 'chatbox', 'tuyendung_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function logoImage()
    {
        return $this->hasOne(Image::class, 'id', 'logo');
    }
}
