<?php

namespace App\Crm\Customer\Events;



use App\Crm\Customer\Models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Customer $customer;

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function getCustomer(): Customer
    {
        return $this->customer ;
    }

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( Customer $customer)
    {
        $this->customer=$customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
