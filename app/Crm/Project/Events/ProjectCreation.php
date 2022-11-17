<?php

namespace App\Crm\Project\Events;


use App\Crm\Project\Models\Project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Project $project;

    /**
     * @param Project $project
     */
    public function setProject(Project $project): void
    {
        $this->project = $project;
    }

    public function getProject(): Project
    {
        return $this->project ;
    }

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( Project $project)
    {
        $this->project=$project;
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
