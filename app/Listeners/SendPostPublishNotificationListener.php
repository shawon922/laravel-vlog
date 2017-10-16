<?php

namespace App\Listeners;

use App\Events\PostPublishedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mail\PostPublishedMail;
use App\User;


class SendPostPublishNotificationListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostPublishedEvent  $event
     * @return void
     */
    public function handle(PostPublishedEvent $event)
    {
        \Log::info('Send post publish notification.', ['post' => $event->post, 'author' => $event->author]);

        $users = User::all();

        foreach ($users as $user) {
            \Mail::to($user)->send(new PostPublishedMail($event->post, $event->author));
        }
        

        //dd($event);
    }
}
