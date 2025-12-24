<?php

namespace App\Providers;

use App\Infrastructure\Persistence\Eloquent\Models\InvoiceModel;
use App\Policies\InvoicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        InvoiceModel::class => InvoicePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
