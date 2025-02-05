<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifInvoiceCustomer extends Mailable
{
    use Queueable, SerializesModels;
    public $data, $transaction, $socialmedia, $about;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $transaction, $socialmedia, $about)
    {
        $this->data = $data;
        $this->transaction = $transaction;
        $this->socialmedia = $socialmedia;
        $this->about = $about;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification Invoice Customer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.sites.invoicecustomer',
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
