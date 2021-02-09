<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pertemuans()
    {
        return $this->hasMany('App\Pertemuan', 'user_id', 'id');
    }

    public function komentars()
    {
        return $this->hasMany('App\Komentar', 'user_id', 'id');
    }

    public function tugasKumpuls()
    {
        return $this->hasMany('App\TugasKumpul', 'user_id', 'id');
    }
}
