<?php

namespace App\Providers;

use App\Events\InvoiceCreated;
use App\Listeners\HandleInvoiceCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InvoiceCreated::class => [
            HandleInvoiceCreated::class,
        ],
    ];
}
