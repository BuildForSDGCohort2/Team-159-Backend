<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'status',
        'package_id',
    ];
    public function package()
    {
        return $this->belongsTo('App/Package');
    }
}
