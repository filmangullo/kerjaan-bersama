<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komentar extends Model
{
    use SoftDeletes;
    protected $table = 'komentars';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
