<?php

namespace App\Listeners\Notification;

use App\Events\Notification\SendNotificationToUsers;
use App\Models\User;
use App\Notifications\UsersTestNotification;

class SendNotificationsToUsers
{
    public function handle(SendNotificationToUsers $event)
    {
        $users = User::all();

        \Illuminate\Support\Facades\Notification::send($users, new UsersTestNotification('Test Notification!'));
    }
}
