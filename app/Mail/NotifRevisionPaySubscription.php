<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifRevisionPaySubscription extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $socialmedia, $about, $contact;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $socialmedia, $about, $contact)
    {
        $this->data = $data;
        $this->socialmedia = $socialmedia;
        $this->about = $about;
        $this->contact = $contact;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Revision Attachment Pay Subscription Vela Dentist',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.sites.revisionpaysubscription',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
