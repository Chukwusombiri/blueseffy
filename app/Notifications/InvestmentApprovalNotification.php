<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentApprovalNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($investment)
    {
        $this->investment = $investment;
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
        ->subject('Investment Approval')
        ->Greeting('Hello '.$this->investment->user->name.',')
        ->line('Congratulations, your recent investment of $'.$this->investment->amount.' has been approved.')
        ->line('You invested into '.($this->investment->plan->name ?? 'Profitable').' Investment Plan and will earn '.($this->investment->plan->interest ?? 'handsome return').'% at the end of your trading session.')
        ->line('This investment plan runs for '.($this->investment->plan->duration ?? 'couple of').' days.')
        ->line('Thank you for choosing us!');
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
