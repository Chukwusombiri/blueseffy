<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $deposit;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($deposit)
    {
        $this->deposit = $deposit;
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
                    ->subject('Deposit Request')
                    ->greeting('Hello '.$user->name.'.')
                    ->line('Your Account Funding request of $'.$this->deposit->amount.' has been received by our administrative team.')
                    ->line('You are required to make a deposit of $'.$this->deposit->amount.' into this '.$this->deposit->wallet->name.' address
                    in order to validate transaction.')
                    ->line($company->name.': '.$this->deposit->wallet->address)
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
           
        ];
    }
}
