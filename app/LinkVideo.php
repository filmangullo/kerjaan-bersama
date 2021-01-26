<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkVideo extends Model
{
    use SoftDeletes;
    protected $table = 'link_videos';

    public function pertemuans()
    {
        return $this->belongsTo('App\Pertemuan', 'pertemuan_id', 'id');
    }
}
