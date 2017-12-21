<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobpost extends Model
{
    //
    protected $primaryKey = 'jobpost_id';
    protected $fillable = [
        'position',
        'profession',
        'vacancy_number',
        'circular',
        'company_details',
        'job_details',
        'salary_range',
        'location',
        'jobpost_id',
        'user_id',
    ];

      public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    } 
}