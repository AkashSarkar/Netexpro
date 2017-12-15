<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire_info extends Model
{
    public $table = "hire_info";
    protected $fillable=[
        'employer_id',
        'employee_id',
        'hire_post_id',
        'is_invitaion_accepted'
    ];

}
