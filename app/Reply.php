<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [

        'body',
        'comment_id',
        'commentable_id',
        'commentable_type',
        'user_id',
        
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
     public function user()
    {
        return $this->hasone('\App\User', 'id', 'user_id');
    }
     public function post()
    {
        return $this->hasone('\App\Post', 'id', 'post_id');
    }
    public function comment()
    {
        return $this->hasone('\App\Comment', 'id', 'comment_id');
    }
}
