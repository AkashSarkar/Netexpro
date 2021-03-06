<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [

        'body',
        'commentable_id',
        'commentable_type',
        'user_id',
        'reply_id'
        
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

    public function replies()
    {
        return $this->morphMany('App\Reply', 'reply_id');
    }
}
