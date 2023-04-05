<?php

namespace App\Notifications;

use App\Models\Like;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLikeNotification extends Notification
{
    use Queueable;

    public $like;
    
    public function __construct(Like $like)
    {
        return $this->like = $like;
    }

    
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail(User $user)
    {
        return (new NewLikeEmail($this->like))
                    ->to($user->emailAddresse(), $user->name());
    }

   
    public function toDatabse($notifiable)
    {
        return [
            'type' => 'new_like',
            'like' => $this->like->id(),
            'likeable_id' => $this->like->likeable_id,
            'likeable_type' => $this->like->likeable_type,
            'likeable_subject' => $this->like->likeAble()->likeAbleSubject()
        ];
    }
}
