<?php

namespace App\Listeners;

use App\Events\CommentSubmitted;
use App\Mails\CommentNotificationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCommentNotification
{
    public function __construct () {}
    public function handle(CommentSubmitted $event): void
    {
        Log::info('MAIL TEST');
        Mail::to($event->comment->post->user->email)
            ->send(new CommentNotificationMail($event->comment));
    }
}
