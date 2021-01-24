<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuans';

    public function users()
    {
        return $this->belongsTo('App\MataPelajaran', 'mata_pelajarans_id', 'id');
    }
}
