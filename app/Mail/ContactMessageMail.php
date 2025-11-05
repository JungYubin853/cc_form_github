<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // optional if you want to queue later
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data; // will be available in the view as $data

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
        subject: 'New Contact Message: '.$this->data['subject'],
        from: new Address('admin@yubin.team2lesgo.site', config('app.name')),
        replyTo: [
            new Address($this->data['email'], $this->data['name']),
        ],);

        // return new Envelope(
        //     subject: 'New Contact Message: '.$this->data['subject'],
        //     from: 'admin@yubin.team2lesgo.site'
        // );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.message',
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
