<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalApprovalNotification extends Notification
{
    use Queueable;

    private $withdrawal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($withdrawal)
    {
        $this->withdrawal=$withdrawal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject('Withdrawal Sent')
                    ->greeting('Hello '.$this->withdrawal->user->name.',')
                    ->line('Congratulations, You\'ve successfully withdrawn $'.$this->withdrawal->amount.' worth of '.($this->withdrawal->userWallet->name ?? 'crypto').'.')
                    ->line('The funds has been sent to your designated wallet address. Feel free to contact us for further Enquiries.')
                    ->line('Deposit more today and earn more.')
                    ->line('Thank you for chosing us!');
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
            
        ];
    }
}
