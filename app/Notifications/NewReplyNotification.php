<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Reply;
use App\Mail\NewReplyEmail;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyNotification extends Notification
{
    use Queueable;

    public $reply;
    public $subscription;

  
    public function __construct(Reply $reply, Subscription $subscription)
    {
        $this->reply = $reply;
        $this->subscription = $subscription;
    }

    
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    
    public function toMail(User $user)
    {
        return (new NewReplyEmail($this->reply, $this->subscription))
                    ->to($user->emailAddress(), $user->name());
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_reply',
            'reply' => $this->reply->id(),
            'replyable_id' => $this->reply->replyable_id,
            'replyable_type' => $this->reply->replyable_type,
            'replyable_subject' => $this->reply->replyAble()->replyAbleSubject(),
        ];
    }
}
