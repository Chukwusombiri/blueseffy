<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalRequestNotification extends Notification implements ShouldQueue
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
        $this->withdrawal = $withdrawal;
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
        $company = Company::first();
        $user = User::find(auth()->user()->id);        
        return (new MailMessage)
                    ->subject('Withdrawal Request')
                    ->greeting('Hello '.$user->name.'.')
                    ->line('Our Administration Team received your Withdrawal request of $'.$this->withdrawal->amount.'.')                    
                    ->line('Endevour to double check your withdrawal to be sure you enter the right wthdrawal wallet to avoid permanent loss of funds.')
                    ->line('If you are not sure and want to roll back the request, contact us immediately.')
                    ->line('Thank you for TRUSTING us!')
                    ->line($company->name ?? 'Assetglobal Ltd'.'.');
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
           'action'=>'Withdrawal Request of $'.$this->withdrawal->amount.' is processing',
           'summary'=>'withdrawal request processing',
           'route'=>'withdrawals'
        ];
    }
}
