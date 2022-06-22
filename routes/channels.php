<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('broadcast-test-private-channel.{someId}', function ($user, $someId) {
    return (int) $someId === 666;
});
