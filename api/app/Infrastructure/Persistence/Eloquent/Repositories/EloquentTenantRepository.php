<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Tenant\Contracts\TenantRepository;
use App\Domain\Tenant\Entities\Tenant;
use App\Infrastructure\Persistence\Eloquent\Models\TenantModel;
use App\Infrastructure\Persistence\Mappers\TenantMapper;

class EloquentTenantRepository implements TenantRepository
{
    public function findById(string $id): ?Tenant
    {
        $model = TenantModel::find($id);

        return $model
            ? TenantMapper::toDomain($model)
            : null;
    }

    public function findByHost(string $host): ?Tenant
    {
        $model = TenantModel::where('host', $host)->first();

        return $model
            ? TenantMapper::toDomain($model)
            : null;
    }

    public function save(Tenant $tenant): void
    {
        TenantModel::updateOrCreate(
            ['id' => $tenant->id()],
            [
                'name' => $tenant->name(),
                'active' => $tenant->isActive(),
            ]
        );
    }
}
