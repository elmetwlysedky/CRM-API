<?php

namespace App\Crm\User\Listeners;


use App\Crm\User\Events\UserCreation;

class NotifyDashboardUserCreation
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
     * @param  \App\Crm\User\Events\UserCreation  $event
     * @return void
     */
    public function handle(UserCreation $event)
    {
        $user = $event->getUser();
//        dd($user);
    }
}
