<?php

namespace App\Listeners;

use App\Events\LikeSubmitted;
use App\Mail\TestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLikeNotification
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
     * @param  \App\Events\LikeSubmitted  $event
     * @return void
     */
    public function handle(LikeSubmitted $event)
    {
        Mail::to($event->comment->user->email)
            ->send(new TestMail());
    }
}
