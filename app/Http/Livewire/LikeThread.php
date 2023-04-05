<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Thread;
use Livewire\Component;
use App\Jobs\LikeThreadJob;
use App\Jobs\UnlikeThreadJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;

class LikeThread extends Component
{
    use DispatchesJobs;

    public $thread;
    public $like;

    public function mount(Thread $thread, Like $like)
    {

        $this->thread = $thread;
        $this->like = $like;
    }

    public function toggleLike()
    {
        if ($this->thread->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeThreadJob(Auth::user(), $this->thread));
        } 
        else {
            $this->dispatchSync(new LikeThreadJob(Auth::user(), $this->thread));

        }
    }

    public function render()
    {
        return view('livewire.like-thread');
    }
}
