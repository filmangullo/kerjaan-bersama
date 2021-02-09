<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use SoftDeletes;
    protected $table = 'tugas';

    public function pertemuans()
    {
        return $this->belongsTo('App\Tugas', 'pertemuan_id', 'id');
    }

    public function tugasKumpuls()
    {
        return $this->hasMany('App\TugasKumpul', 'tugas_id', 'id');
    }
}
