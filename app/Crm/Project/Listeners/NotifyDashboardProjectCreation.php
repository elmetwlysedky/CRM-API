<?php

namespace App\Crm\Project\Listeners;


use App\Crm\Project\Events\ProjectCreation;

class NotifyDashboardProjectCreation
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
     * @param  \App\Crm\User\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        $project = $event->getProject();
        dd($project);
    }
}
