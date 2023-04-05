<?php

namespace App\Listeners;

use App\Events\ThreadWasDeleted;


class RemovePointsForDeletingThread
{
    public function handle(ThreadWasDeleted $event)
    {
        $amount = config('points.penalties.deleted_thread');
        $message = 'User deleted a thread';

        $author = $event->thread->author();

        $author->addPoints($amount, $message);
    }
}
