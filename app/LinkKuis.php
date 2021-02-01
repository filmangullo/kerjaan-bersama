<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkKuis extends Model
{
    use SoftDeletes;
    protected $table = 'link_kuis';

    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
