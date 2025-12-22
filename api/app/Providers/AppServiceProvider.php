<?php

namespace App\Providers;

use App\Domain\Auth\Contracts\UserRepository;
use App\Domain\Tenant\Contracts\TenantRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentTenantRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TenantRepository::class,
            EloquentTenantRepository::class,
            UserRepository::class,
            EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
