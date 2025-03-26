<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('private-channel.{id}', function ($user, $id) {
    \Log::debug($id);
    return 1 === 1; // Replace with your actual authentication logic
});