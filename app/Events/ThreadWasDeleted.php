<?php

namespace App\Events;


use App\Models\Thread;
use Illuminate\Queue\SerializesModels;

class ThreadWasDeleted
{
    use SerializesModels;

   
    public $thread;

    
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }
    
}
