<?php

namespace App\Mail;

use App\Models\Thread;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewThreadEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $thread;

    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }


    public function build()
    {
        return $this->subject("Re: {$this->thread->title()} ")
            ->markdown('emails.new_thread');
    }
}
