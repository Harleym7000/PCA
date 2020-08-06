<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'address', 'town', 'postcode', 'tel_no', 'mob_no', 'email', 'password',
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
}
