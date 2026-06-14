<?php

namespace App\Providers;

use App\Events\OrdersEvent\OrderPlacedEvent;
use App\Events\UserRegistered;
use App\Listeners\AssignDefaultRole;
use App\Listeners\CreateUserProfile;
use App\Listeners\OrderListener\GenerateInvoice;
use App\Listeners\OrderListener\ProcessPayment;
use App\Listeners\OrderListener\SendOrderConfirmation;
use App\Listeners\OrderListener\SendOrderSms;
use App\Listeners\SendAdminNotification;
use App\Listeners\SendWelcomeMail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $listeners = [
            SendWelcomeMail::class,
            AssignDefaultRole::class,
            SendAdminNotification::class,
            CreateUserProfile::class,
        ];

        foreach ($listeners as $listener) {
            Event::listen(UserRegistered::class, $listener);
        }

        $orderListeners = [
            GenerateInvoice::class,
            ProcessPayment::class,
            SendOrderConfirmation::class,
            SendOrderSms::class
        ];

        foreach ($orderListeners as $listener) {
            Event::listen(OrderPlacedEvent::class, $listener);
        }
    }
}
