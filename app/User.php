<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => 'array',
        'causes' => 'array'
    ];

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
    }
    
    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles) {
        if($this->roles()->whereIn('name', $roles)->first()) {
        return true;
    }
    return false;
}

    public function assignRole(Role $role)
    {
    return $this->roles()->save($role);
    }

    public function causes()
    {
        return $this->belongsToMany('App\Cause');
    }

    public function hasCause($cause) 
    {
        if($this->causes()->where('name', $cause)->first()) {
            return true;
        }
        return false;
    }
    public function hasAnyCauses($causes) 
    {
        if($this->roles()->whereIn('name', $causes)->first()) {
            return true;
        }
        return false;
    }

    public function assignCause(Cause $cause)
    {
        return $this->cause()->save($cause);
    }

    public function profile() {
        return $this->hasOne('App\Profile');
    }
}
