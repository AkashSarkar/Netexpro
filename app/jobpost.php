<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobpost extends Model
{
    //

    protected $fillable = [
        'position',
        'profession',
        'vacancy_number',
        'circular',
        'company_details',
        'job_details',
        'location',
       
        'user_id',
    ];

      public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    } 
}