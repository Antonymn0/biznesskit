<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

        // user events
        'App\Events\userCreated' => [
            //
        ],
        'App\Events\userUpdated' => [
            //
        ],
        'App\Events\userDestroyed' => [
            //
        ],

        // wallet events
        'App\Events\walletCreated' => [
            //
        ],
        'App\Events\walletUpdated' => [
            //
        ],
        'App\Events\walletDestroyed' => [
            //
        ],

        // variation events
        'App\Events\variationCreated' => [
            //
        ],
        'App\Events\variationUpdated' => [
            //
        ],
        'App\Events\variationDestroyed' => [
            //
        ],

        // tax events
        'App\Events\taxCreated' => [
            //
        ],
        'App\Events\taxUpdated' => [
            //
        ],
        'App\Events\taxDestroyed' => [
            //
        ],

        // subscription events
        'App\Events\subscriptionCreated' => [
            //
        ],
        'App\Events\subscriptionUpdated' => [
            //
        ],
        'App\Events\subscriptionDestroyed' => [
            //
        ],

        // shift events
        'App\Events\shiftCreated' => [
            //
        ],
        'App\Events\shiftUpdated' => [
            //
        ],
        'App\Events\shiftDestroyed' => [
            //
        ],

        // subscriber events
        'App\Events\subscriberCreated' => [
            //
        ],
        'App\Events\subscriberUpdated' => [
            //
        ],
        'App\Events\subscriberDestroyed' => [
            //
        ],

        // setting events
        'App\Events\settingCreated' => [
            //
        ],
        'App\Events\settingUpdated' => [
            //
        ],
        'App\Events\settingDestroyed' => [
            //
        ],

        // reportProduct events
        'App\Events\reportProductCreated' => [
            //
        ],
        'App\Events\reportProductUpdated' => [
            //
        ],
        'App\Events\reportProductDestroyed' => [
            //
        ],

        // report events
        'App\Events\reportCreated' => [
            //
        ],
        'App\Events\reportUpdated' => [
            //
        ],
        'App\Events\reportDestroyed' => [
            //
        ],

        // product events
        'App\Events\productCreated' => [
            //
        ],
        'App\Events\productUpdated' => [
            //
        ],
        'App\Events\productDestroyed' => [
            //
        ],

        // payment events
        'App\Events\paymentCreated' => [
            //
        ],
        'App\Events\paymentUpdated' => [
            //
        ],
        'App\Events\paymentDestroyed' => [
            //
        ],

        // orderProduct events
        'App\Events\orderProductCreated' => [
            //
        ],
        'App\Events\orderProductUpdated' => [
            //
        ],
        'App\Events\orderProductDestroyed' => [
            //
        ],

        // order events
        'App\Events\orderCreated' => [
            //
        ],
        'App\Events\orderUpdated' => [
            //
        ],
        'App\Events\orderDestroyed' => [
            //
        ],

        // inventory events
        'App\Events\inventoryCreated' => [
            //
        ],
        'App\Events\inventoryUpdated' => [
            //
        ],
        'App\Events\inventoryDestroyed' => [
            //
        ],

        // employee events
        'App\Events\employeeCreated' => [
            //
        ],
        'App\Events\employeeUpdated' => [
            //
        ],
        'App\Events\employeeDestroyed' => [
            //
        ],

        // customer events
        'App\Events\customerCreated' => [
            //
        ],
        'App\Events\customerUpdated' => [
            //
        ],
        'App\Events\customerDestroyed' => [
            //
        ],

        // category events
        'App\Events\categoryCreated' => [
            //
        ],
        'App\Events\categoryUpdated' => [
            //
        ],
        'App\Events\categoryDestroyed' => [
            //
        ],

        // admin events
        'App\Events\adminCreated' => [
            //
        ],
        'App\Events\adminUpdated' => [
            //
        ],
        'App\Events\adminDestroyed' => [
            //
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
