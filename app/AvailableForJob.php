<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class AvailableForJob extends Model
{
    protected $primaryKey = 'useravailablepost_id';
     protected $fillable = [
        'position',
        'profession',
        'CV',
        'highlight',
        'location',
        'user_id',
        'useravailablepost_id',
    ];

      public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    } 
}
