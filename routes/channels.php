<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('broadcast-test-private-channel.{someId}', function ($user, $someId) {
    return (int) $someId === 666;
});

Broadcast::channel('room', function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});

Broadcast::channel('users.{userId}', function ($user, $userId) {
    return $user->id === (int) $userId;
});
