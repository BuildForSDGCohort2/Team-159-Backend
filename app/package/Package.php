<?php

namespace App\package;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name',
        'package_description',
        'package_weight',
        'package_category',
        'package_pickup_address',
        'package_delivery_address',
        'user_id',
        
    ];

    public function status(){
        $this->hasOne(\App\package\Status::class);
    }

    public function user(){
        $this->hasOne(\App\User::class);
    }
}
