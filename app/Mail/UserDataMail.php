<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserDataMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Data Mail from Artixcore',
        );
    }
    
    public function build()
    {
        return $this->from('askartixcore@artixcore.com')
        ->view('mails.userdata')
        ->with([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'description' => $this->data['description'],
        ]);
    }
}
