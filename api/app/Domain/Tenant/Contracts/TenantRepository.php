<?php

namespace App\Domain\Tenant\Contracts;

use App\Domain\Tenant\Entities\Tenant;

interface TenantRepository
{
    public function findById(string $id): ?Tenant;

    public function findByHost(string $host): ?Tenant;

    public function save(Tenant $tenant): void;
}
