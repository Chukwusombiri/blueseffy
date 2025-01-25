<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PromoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $promo;
    private $promo_message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($promo, $promo_message)
    {
        $this->promo = $promo;
        $this->promo_message=$promo_message;
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
        return (new MailMessage)
                    ->line($this->promo_message)                    
                    ->line('Thank you for Choosing '.$company->name.'!');
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
          'action'=>'$'.$this->promo->amount.' promo earnings was funded to you.' 
        ];
    }
}
