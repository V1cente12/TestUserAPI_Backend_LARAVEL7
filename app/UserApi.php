<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserApi extends Model
{
    use SoftDeletes;

    protected $table = 'userapi';

    protected $fillable = [
        'uid', 
        'first_name', 
        'last_name', 
        'email', 
        'password', 
        'address', 
        'phone', 
        'phone_2', 
        'postal_code', 
        'birth_date', 
        'gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
