<?php

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    event(new \App\Events\UserSignedUp('Tieu Ngao'));
    return view('welcome');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
