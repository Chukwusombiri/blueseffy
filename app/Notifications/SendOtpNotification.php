<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $otp_code;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp_code)
    {
        $this->otp_code = $otp_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Validate Withdrawal')
                    ->greeting('Hello')
                    ->line('Someone requested a One Time Password on your acount for validating direct withdrawal of funds to Bank account.')
                    ->line('If this request was not initiated by you, take no further action and ignore this message.')      
                    ->line('OTP: '.$this->otp_code)              
                    ->line('Thank you for banking with BLUESTECH Ltd!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
