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
        
    ];
    
}
