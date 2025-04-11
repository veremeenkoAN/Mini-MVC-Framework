<?php

namespace App\Model;
use Core\Model;

class SignUp extends Model
{

    protected $fillable = ['name','lastname','email','password'];

    public $table = 'users';
    protected $rules = [
        'name' => ['min' => 4, 'max' => 50, 'required' => true],
        'lastname' => ['min' => 4, 'max' => 50, 'required' => true],
        'password' => ['min' => 8, 'max' => 50, 'required' => true],
        'email' => ['min' => 6, 'max' => 50, 'required' => true],
    ];

}