<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ROIProjectorMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $amount;
    public $rate;
    public $duration;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email,$amount,$rate,$duration,$comment)
    {
        $this->name =$name;
        $this->email =$email;
        $this->amount =$amount;
        $this->rate =$rate;
        $this->duration =$duration;
        $this->comment =$comment;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'R.O.I Projector Request',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.roiprojector',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
