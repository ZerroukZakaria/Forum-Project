<?php

namespace App\Listeners;

use App\Events\ReplyWasDeleted;

class RemovePointsForDeletingReply
{

    public function handle(ReplyWasDeleted $event)
    {
        $amount = config('points.penalties.deleted_reply');
        $message = 'User deleted a reply';

        $author = $event->reply->author();

        $author->addPoints($amount, $message);
    }
}
