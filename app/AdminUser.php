<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $fillable =[
        'user_id',
        'admin_id',
    ];
    
}
