<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostPublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $author;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post, $author)
    {
        $this->post = $post;
        $this->author = $author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post-published-mail')->with('postUrl', route('post-details', $this->post->id));
    }
}
