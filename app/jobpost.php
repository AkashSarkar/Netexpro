<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobpost extends Model
{
    //

    protected $fillable = [
        'profession',
        'position',
        'location',
        'Description',
        'user_id',
    ];
}