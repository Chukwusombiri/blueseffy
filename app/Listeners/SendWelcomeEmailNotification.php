<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserNotification;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {        
        $event->user->notify(new WelcomeEmailNotification($event->user));
        if($admin = User::where('is_admin',1)->first()){
            $admin->notify(new NewUserNotification($event->user));
        }        
    }
}
