<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsersTestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [
            'mail',
            'database',
            'broadcast',
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->message)
                    ->action('Notification Action', route('notifications.index'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'user' => $notifiable->name,
            'message' => $this->message,
            'additionalFieldToDB' => "I'm DB!",
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user' => $notifiable->name,
            'message' => $this->message,
            'additionalFieldToBroadcast' => "I'm Broadcast!",
        ]);
    }

    /**
     * Will be used when toBroadcast or toDatabase methods are empty
     */
//    public function toArray($notifiable)
//    {
//        return [
//            'user' => $notifiable->name,
//            'message' => $this->message,
//        ];
//    }

    public function broadcastType()
    {
        return 'users.test.notification';
    }
}
