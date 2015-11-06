<?php

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'JohnDoe'
        ]
    ];
    // In Episode 4, we'll use Laravel's event broadcasting.
    Redis::publish('test-channel', json_encode($data));
    return view('welcome');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
