<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;  
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
        $company = Company::first();
        return (new MailMessage)
        ->subject('WELCOME!!')
        ->line('Welcome to '.$company->name ?? 'BLUESTECH Ltd'.', we are very glad to have you with us. Start today! Grow Today!')
        ->line('Go ahead to login into your account and get started with your first transactions.')
        ->line('Thank you for choosing us! '.$this->user->name)
        ->action('visit our webpage', url('/'));
        
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
