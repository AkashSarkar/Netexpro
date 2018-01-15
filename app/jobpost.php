<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobpost extends Model
{
    //
    protected $primaryKey = 'jobpost_id';
    protected $fillable = [
        'job_type',
        'position',
        'profession',
        'department',
        'vacancy_number',
        'job_level',
        'circular',
        'company_details',
        'job_details',
        'salary_range',
        'under_grad',
        'post_grad',
        'experience',
        'industry',
        'location',
        'jobpost_id',
        'user_id',
    ];

      public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    } 
}