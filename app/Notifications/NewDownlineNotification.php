<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDownlineNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','Database'];
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
        return (new MailMessage)->subject('New Affiliate Sign Up')
                    ->greeting('Hello!')
                    ->line($this->user->name.' Signed up through your Affiliate Link '.$this->user->created_at->diffForHumans())                                        
                    ->line(' Earn as much as 10% income for every successful deposit made by your referral.')
                    ->line($company->name.' is an ever growing and successful family.')
                    ->line('Thank you for been with us!!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $action = $this->user->name.' Signed Up through your Affiliate Link.';
        return [            
            'action' => $action,
        ];
    }
}
