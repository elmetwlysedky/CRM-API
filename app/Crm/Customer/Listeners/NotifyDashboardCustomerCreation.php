<?php

namespace App\Crm\Customer\Listeners;

use App\Crm\Customer\Events\CustomerCreation;


class NotifyDashboardCustomerCreation
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
     * @param  \App\Crm\Customer\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(CustomerCreation $event)
    {
        $customer = $event->getCustomer();
        dd($customer);
    }
}
