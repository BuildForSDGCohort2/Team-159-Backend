<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packageuser extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
    ];
}
