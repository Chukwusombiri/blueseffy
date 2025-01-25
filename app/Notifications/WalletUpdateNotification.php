<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WalletUpdateNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $wallet;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($wallet)
    {
       $this->wallet = $wallet;
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
                    ->subject('Company Wallet Updated')
                    ->greeting('Hello Admin')
                    ->line('You updated '.$this->wallet->name.' wallet having Address = '.$this->wallet->address)                    
                    ->line('Thank you for your Administration!');
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
            'action'=>$this->wallet->name.' wallet was updated.'
        ];
    }
}
