<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkPresentasi extends Model
{
    use SoftDeletes;
    protected $table = 'link_presentasis';

    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
