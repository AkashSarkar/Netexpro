<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    //
    protected $fillable = [
        'visibilities_type',
        'post_id',
        

    ];

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
