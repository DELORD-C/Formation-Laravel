<?php

namespace App\Mails;

use App\Models\Comment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CommentNotificationMail extends Mailable
{
    public function __construct(private readonly Comment $comment){}
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('New comment')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.commentNotification',
            with: ['comment' => $this->comment]
        );
    }
}
