<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'client_name',
        'telephone_number',
        'client_address',
        'user_id',
        'package_id',
    ];
    public function packages()
    {
        return $this->hasMany('App/Package');
    }
}
