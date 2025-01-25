<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FiatWithdrawalApprovalNotification extends Notification
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
        ->subject('Withdrawal Completed')
        ->greeting('Hello '.$this->withdrawal->user->name.',')
        ->line('Congratulations, You\'ve successfully withdrawn $'.$this->withdrawal->amount.'.')
        ->line('Transaction ID: '.$this->withdrawal->id)
        ->line('Account Name: '.$this->withdrawal->account_name)
        ->line('Account Number: '.$this->withdrawal->account_no)
        ->line('Recipient Bank: '.$this->withdrawal->bank_name)
        ->line('Routing Number: '.$this->withdrawal->routing_no)
        ->line('Description: '.$this->withdrawal->description ?? 'NIL')
        ->line('Feel free to contact us for further Enquiries.')
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
            //
        ];
    }
}
