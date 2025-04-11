<?php

namespace App\Model;

class Signin extends \Core\Model
{


    protected $fillable = ['email','password'];
    protected $rules = [
        'email' => ['required' => 'true'],
        'password' => ['required' => 'true']
    ];


}