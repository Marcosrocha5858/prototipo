<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Events\Tenant\CompanyCreated;
use App\Listeners\Tenant\CreateCompanyDatabase;
use App\Listeners\Tenant\runMigrationsTenant;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\Tenant\DatabaseCreated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CompanyCreated::class =>[
            CreateCompanyDatabase::class,
        ],
        DatabaseCreated::class =>[
            runMigrationsTenant::class,
        ],

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
}
