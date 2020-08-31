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
        'user_id',
        'client_id',
        'company_id',
        'status_id',
    ];

    public function user()
    {
        return $this->belongsTo('App/User');
    }
    public function client()
    {
        return $this->belongsTo('App/Client');
    }
    public function company()
    {
        return $this->belongsTo('App/Company');
    }
    public function Statuses()
    {
        return $this->hasMany('App/Status');
    }
}
