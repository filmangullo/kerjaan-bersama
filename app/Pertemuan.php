<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuans';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function mataPelajarans()
    {
        return $this->belongsTo('App\MataPelajaran', 'mata_pelajarans_id', 'id');
    }

    public function deskripsis()
    {
        return $this->hasMany('App\Deskripsi', 'pertemuan_id', 'id');
    }

    public function linkVideos()
    {
        return $this->hasMany('App\LinkVideo', 'pertemuan_id', 'id');
    }

    public function dokumens()
    {
        return $this->hasMany('App\Dokumen', 'pertemuan_id', 'id');
    }

    public function komentars()
    {
        return $this->hasMany('App\Komentar', 'pertemuan_id', 'id');
    }
}
