<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TugasKumpul extends Model
{
    use SoftDeletes;
    protected $table = 'tugas_kumpuls';

    public function tugas()
    {
        return $this->belongsTo('App\Tugas', 'tugas_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
