<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Update extends Component
{
    use AuthorizesRequests;
    public $replyId;
    public $replyOldBody;
    public $replyNewBody;
    public $author;
    public $createdAt;

    protected $listeners = ['deleteReply'];

    public function mount(Reply $reply) {

        $this->replyId = $reply->id();
        $this->replyOldBody = $reply->body();
        $this->author = $reply->author() ;
        $this->createdAt = $reply->created_at->diffForHumans();

        $this->initialize($reply);
    
    }

    public function updateReply() {

        $reply = Reply::findOrFail($this->replyId);

        $this->authorize(ReplyPolicy::UPDATE, $reply);

        $reply->body = $this->replyNewBody;
        $reply->save();

        $this->initialize($reply);
    }

    public function deleteReply($page) {

        session()->flash('success', 'Reply Deleted');
        return redirect()->to($page);

    }


    public function initialize(Reply $reply) {


        $this->replyOldBody = $reply->body();
        $this->replyNewBody = $this->replyOldBody;
    }

    public function render()
    {
        return view('livewire.reply.update');
    }
}
