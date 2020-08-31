<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'company_name',
        'company_description',
        'telephone_number',
        'company_address',
        'package_id',
        'user_id',
    ];
    public function packages(){
        return $this->hasMany('app/Package');
    }
    public function user()
    {
        return $this->belongsTo('app/User');
    }
}
