<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'education',
    
        'phone_no',
        'gender',
        'nid',
        'bank_ac',
        'location',
        'dob',
        'available_for_job',
        'hiring',
        'post_viewed',
        'post_rated',
        'total_tagged_in',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function interests()
    {
        return $this->hasMany('App\Interest');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
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
        return $this->morphMany('App\Comment', 'commentable');
    }
     
}
