<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
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
    
}
