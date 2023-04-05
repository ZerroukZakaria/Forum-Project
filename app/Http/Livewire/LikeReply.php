<?php

namespace App\Http\Livewire;

use App\Events\PostWasLiked;
use App\Models\Reply;
use Livewire\Component;
use App\Jobs\LikeReplyJob;
use App\Jobs\UnLikeReplyJob;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\Dispatchable;

class LikeReply extends Component
{
    use Dispatchable;

    public $reply;
    public $like;

    public function mount(Reply $reply, Like $like)
    {
        $this->reply = $reply;
        $this->like = $like;
    }

    public function toggleLike()
    {        
        if ($this->reply->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnLikeReplyJob($this->reply, Auth::user()));
        } else {
            $this->dispatchSync(new LikeReplyJob( $this->reply, Auth::user()));


        }
    }

    public function render()
    {
        return view('livewire.like-reply');
    }
}
