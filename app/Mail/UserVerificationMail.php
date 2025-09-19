<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Users; // 👈 import your model

class UserVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // 👈 declare property

    /**
     * Create a new message instance.
     */
    public function __construct(Users $user)
    {
        $this->user = $user; // 👈 assign user
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'User Verification Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.user_verification',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments()
    {
        return [];
    }
}
