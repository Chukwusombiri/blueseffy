<?php

namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sjt;
    public $path;
    public $attachee_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg,$sjt,$path=null,$attachee_name=null)
    {
        $this->msg = $msg;
        $this->sjt = $sjt;
        if($path!=null){
            $this->path = $path;
            $this->attachee_name = $attachee_name;
        }
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->sjt,
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
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        if($this->path!=null){
            return [
                Attachment::fromStorage($this->path)->as($this->attachee_name),
            ];
        }       
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = Company::first();
        return $this->subject($this->sjt)->
        replyTo($company->email)->from($company->email)
        ->markdown('admin.email.mail',[
            'msg'=>$this->msg,
            'sjt'=>$this->sjt,
        ]);
    }
}
