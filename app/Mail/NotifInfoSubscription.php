<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifInfoSubscription extends Mailable
{
    use Queueable, SerializesModels;
    public $data, $admin, $socialmedia, $about, $contact;

    /**
     * Create a new message instance.
     */
    public function __construct($admin, $data, $socialmedia, $about, $contact)
    {
        $this->admin = $admin;
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
            subject: 'Notification Info Subscription',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.sites.infosubscription',
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
