<?php

namespace App\Providers;

use App\Events\Notification\SendNotificationToUsers;
use App\Listeners\Notification\SendNotificationsToUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendNotificationToUsers::class => [
            SendNotificationsToUsers::class,
        ],
    ];
}
