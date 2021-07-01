<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajarans';

    public function pertemuans()
    {
        return $this->hasMany('App\Pertemuan', 'mata_pelajarans_id', 'id');
    }

}
