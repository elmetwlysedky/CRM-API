<?php

namespace App\Crm\User\Events;


use App\Crm\User\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;

    /**
     * @param User $user
     */
    public function setuser(User $user): void
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user ;
    }

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( User $user)
    {
        $this->user=$user;
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
