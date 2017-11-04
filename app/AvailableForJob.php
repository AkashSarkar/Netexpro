<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class AvailableForJob extends Model
{
     protected $fillable = [
        'position',
        'profession',
        'CV',
        'highlight',
        'location',
        'user_id',
    ];
}
