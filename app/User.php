<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\package\Package;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(){
        return $this->role->slug == 'admin' ? true : false;
    }

    public function isDispatcher(){
        return $this->role->slug == 'dispatcher' ? true : false;
    }

    public function isClient(){
        return $this->role->slug == 'client' ? true : false;
    }

    public function packages(){
        return $this->hasMany(Package::class);
    }
    public function profile(){
    return $this->hasOne(Profile::class);
    }
}
