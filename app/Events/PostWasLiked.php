<?php

namespace App\Events;


use App\Models\Like;
use Illuminate\Queue\SerializesModels;

class PostWasLiked
{
    use  SerializesModels;

    public $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
