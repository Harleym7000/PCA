<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $tablename = 'user_profile';
    protected $primaryKey = 'id';

    public function users() {
        return $this->hasOne('App\User');
    }
}
