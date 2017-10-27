<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    protected $fillable = [
        'interest_type',
        'profession',
        'industry',
        'interest_priority',
        'user_id',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
