<?php

namespace App\Listeners;

use App\Events\PostWasLiked;
use App\Notifications\NewLikeNotification;


class sendNewLikeNotification
{
  
    public function handle(PostWasLiked $event)
    {
        $post = $event->like->likeAble();
        $post->author()->notify(new NewLikeNotification($event->like));
    }
}
