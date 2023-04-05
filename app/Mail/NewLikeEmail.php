<?php

namespace App\Mail;

use App\Models\Like;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLikeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Re: {$this->like->likeAble()->title()}")
        ->markdown('emails.new_like');
    }
}
