<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Enroll;

class RejectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enroll;

    /**
     * Create a new message instance.
     */
    public function __construct(Enroll $enroll)
    {
        $this->enroll = $enroll;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Enrollment Rejected',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Admin.Rejection',
            with: [
                'enroll' => $this->enroll,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
