<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagepost extends Model
{
    //

    protected $fillable = [
        'post_id',
        'post_image',
    ];

    public function imagepost()
    {
        return $this->belongsTo('App\Post');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
}
