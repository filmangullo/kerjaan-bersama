<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balasan extends Model
{
    use SoftDeletes;
    protected $table = 'balasans';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function pertemuans()
    {
        return $this->belongsTo('App\Komentar', 'komentar_id', 'id');
    }
}
