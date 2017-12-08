<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    //
    protected $fillable = [
         
                'user_id',
                'jobpost_id',
                
            ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
        
}
