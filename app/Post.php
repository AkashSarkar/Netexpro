<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //

    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_type',
        'description',
        'url',
        'file_attach',
        'location',
        'ratting',
        'post_tags',
        'post_id',
        'user_id',
        

    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function imagepost()
    {
        return $this->hasMany('App\Imagepost');
    }
      public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
       public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
    
}
