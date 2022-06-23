<?php

namespace App\Http\Controllers;

use App\Events\Broadcast\NewMessageEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function room(): View
    {
        $userId = rand(1, 10);
        $user = User::whereId($userId)->firstOrFail();
        auth()->login($user);

        return view('room', ['user' => $user]);
    }

    public function sendMessage(Request $request): void
    {
        event(
            new NewMessageEvent($request->message)
        );
    }
}
