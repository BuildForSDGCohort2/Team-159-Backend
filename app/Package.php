<?php

namespace App;

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
        'user-id',
        'client_id',
        'company_id',
        'status_id',
    ];
}
