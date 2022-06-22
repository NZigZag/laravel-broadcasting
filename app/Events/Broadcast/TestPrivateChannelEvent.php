<?php

namespace App\Events\Broadcast;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestPrivateChannelEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $someId;

    public function __construct($someId)
    {
        $this->someId = $someId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('broadcast-test-private-channel.' . $this->someId);
    }

    public function broadcastAs()
    {
        return 'my-broadcast-test-private-channel-event';
    }
}
