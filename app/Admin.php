<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable =[ 
        'name_ofAdmin',
    ];

    public function users()
    {
        return $this->hasMany('App/User');
    }
}
