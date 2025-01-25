<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralIncomeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $deposit;
    private $ref_earn;
    private $name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$deposit,$ref_earn)
    {
        $this->name = $name;
        $this->deposit = $deposit;
        $this->ref_earn=$ref_earn;
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
                    ->subject('Referral Income')
                    ->greeting('Hello '.$this->name.',')
                    ->line('Congratulations, you\'ve been funded Affiliate commision of $'.$this->ref_earn.' for deposit made by your referral '.$this->deposit->user->name)
                    ->line('Invite more family, friends and colleagues. You will earn more income as they deposit funds.')                    
                    ->line('Reaching your financial goals faster is very possible through '.$company->name ?? 'BLUESTECH LTD'.'!')
                    ->line('Thank you for always choosing us!');
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
