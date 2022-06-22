<?php

namespace App\Http\Controllers;

use App\Events\Broadcast\TestPrivateChannelEvent;
use App\Events\Broadcast\TestPublicChannelEvent;
use App\Models\User;
use Illuminate\View\View;

class BroadcastController extends Controller
{
    public function index(): View
    {
        $user = User::whereId(1)->firstOrFail();
        auth()->login($user);

        return view('test-broadcast-channel');
    }

    public function executePublicEvent(): void
    {
        event(
            new TestPublicChannelEvent('my-broadcast-test-public-channel-event')
        );
    }

    public function executePrivateEvent(): void
    {
        event(
            new TestPrivateChannelEvent(666)
        );
    }

    public function room(): View
    {
        $userId = rand(1, 10);
        $user = User::whereId($userId)->firstOrFail();
        auth()->login($user);

        return view('room', ['user' => $user]);
    }
}
