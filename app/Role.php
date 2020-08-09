<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;


class Role extends Model
{
    use LaratrustUserTrait;
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
