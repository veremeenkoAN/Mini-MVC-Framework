<?php

//U can indicate one or two request methods for both getting webpage and middleware


app()->router->add('/',[\App\Controllers\MainController::class,'index'],['get'])->only([\Core\Middleware\Auth::class,'index'],['get']);
app()->router->add('/signup',[\App\Controllers\SignupController::class,'index'],['get','post'])->only([\Core\Middleware\Auth::class,'index2'],['get']);
app()->router->add('/signin',[\App\Controllers\SigninController::class,'index'],['get','post'])->only([\Core\Middleware\Auth::class,'index2'],['get']);
app()->router->add('/delete',[\App\Controllers\DeleteController::class,'index'],['get'])->only([\Core\Middleware\Auth::class,'index2'],['get']);