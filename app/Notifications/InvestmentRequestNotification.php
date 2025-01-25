<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentRequestNotification extends Notification
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
        $user = User::find(auth()->user()->id);
        $company = Company::first();
        return (new MailMessage)
                    ->subject('Investment Request')
                    ->greeting('Hello '.$user->name.'.')
                    ->line('Your investment request of $'.$this->investment->amount.' has been received by our administrative team.')
                    ->line('You are required to make a deposit of $'.$this->investment->amount.' into this '.$this->investment->wallet->name.' address
                    in order to validate transaction.')
                    ->line($company->name.': '.$this->investment->wallet->address)
                    ->line('Thank you for making this giant strides with us!');
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
