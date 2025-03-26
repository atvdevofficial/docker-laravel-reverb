<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/fake-broadcasting/auth', function () {
    $channelName = request()->input('channel_name');
    if (true) {
        return response()->json([
            'auth' => 'your-auth-response', 'channel' => $channelName
        ]);
    } else {
        return response()->json([
            'auth' => null
        ], 403);
    }
});