<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Thread;
use App\Mail\NewThreadEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewThreadNotification extends Notification
{
    use Queueable;

    public $thread;

    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail(User $user)
    {
        return (new NewThreadEmail($this->thread))
            ->to($user->emailAddress(), $user->name());
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
            //
        ];
    }
}
