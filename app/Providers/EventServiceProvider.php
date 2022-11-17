<?php

namespace App\Providers;

use App\Crm\Project\Events\ProjectCreation;
use App\Crm\Project\Listeners\NotifyDashboardProjectCreation;
use App\Crm\Customer\Events\CustomerCreation;
use App\Crm\Customer\Listeners\NotifyDashboardCustomerCreation;
use App\Crm\User\Events\UserCreation;
use App\Crm\User\Listeners\NotifyDashboardUserCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        CustomerCreation::class=>[
            NotifyDashboardCustomerCreation::class
        ],
        ProjectCreation::class=>[
            NotifyDashboardProjectCreation::class
        ],
        UserCreation::class=>[
            NotifyDashboardUserCreation::class
        ]


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
