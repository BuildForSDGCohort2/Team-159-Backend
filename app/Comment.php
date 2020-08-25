<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 
        'comment_body',
        'commentable_id',
        'commentable_type',
        'user_id',

    ];
}
