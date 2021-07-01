<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarHadirWaktuTutup extends Model
{
    protected $table = 'daftar_hadir_waktu_tutups';

    protected $fillable = ['pertemuan_id', 'tanggal_dan_jam'];

    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
