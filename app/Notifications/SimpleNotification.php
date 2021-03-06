<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SimpleNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('There is new test notification')
                    ->action('Go to Website', url('/'))
                    ->line('Thank you for using our application!');
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'content' => 'There is an new Order',
    //         'url' => url('/')
    //     ];
    // }

    // public function toBroadcast($notifiable)
    // {
    //     return [
    //         'content' => 'There is an new Order',
    //         'url' => url('/')
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'content' => 'There is an new Order',
            'url' => url('/')
        ];
    }
}
