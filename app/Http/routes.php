<?php

use Illuminate\Support\Facades\Redis;

Route::get('/redis', function () {
    event(new \App\Events\UserSignedUp('Tieu Ngao'));
    return view('welcome');
});

Route::get('/', function(){
    return view('chat');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
