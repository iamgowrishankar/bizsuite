<?php

namespace App\Application\Tenant;

use App\Domain\Tenant\Entities\Tenant;

class TenantContext
{
    private static ?Tenant $tenant = null;

    public static function set(Tenant $tenant): void
    {
        self::$tenant = $tenant;
    }

    public static function get(): ?Tenant
    {
        return self::$tenant;
    }
}
