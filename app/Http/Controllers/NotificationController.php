<?php

namespace App\Http\Controllers;

use App\Events\Notification\SendNotificationToUsers;
use App\Models\User;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        $userId = rand(1, 10);
        $user = User::whereId($userId)->firstOrFail();
        auth()->login($user);

        return view('notification.index', ['user' => $user]);
    }

    public function sendNotificationsToUsers(): void
    {
        event(
            new SendNotificationToUsers
        );
    }
}
