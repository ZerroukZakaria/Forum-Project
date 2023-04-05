<?php

namespace App\Jobs;

use App\Models\Reply;
use App\Models\User;

class UnLikeReplyJob 
{

  private $reply;
  private $user;
  
    public function __construct(Reply $reply, User $user)
    {
        $this->reply = $reply;
        $this->user = $user;
        $this->handle();

    }

    
    public function handle()
    {
        $this->reply->dislikedBy($this->user);
    }
}
