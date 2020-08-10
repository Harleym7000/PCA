<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $tablename = 'causes';
    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
