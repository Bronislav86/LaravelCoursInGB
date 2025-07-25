<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserEmailChangedNotification extends Notification
{
    use Queueable;

    private string $oldEmail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $oldEmail)
    {
        $this->oldEmail = $oldEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $notifiable->id,
            'old_email' => $this->oldEmail,
            'news_email' => $notifiable->email,
            //
        ];
    }
}
