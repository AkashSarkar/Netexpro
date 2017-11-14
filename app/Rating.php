<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['rating', 'post_id', 'user_id'];

   
  
    /**
     * Rating belongs to a user.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }


    public function post()
    {
        return $this->belongsTo('App\Post');
    }

 
}
