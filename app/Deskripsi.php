<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    protected $table = 'deskripsis';

    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
