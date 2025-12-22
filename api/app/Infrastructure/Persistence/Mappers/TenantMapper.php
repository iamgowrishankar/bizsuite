<?php

namespace App\Infrastructure\Persistence\Mappers;

use App\Domain\Tenant\Entities\Tenant;
use App\Infrastructure\Persistence\Eloquent\Models\TenantModel;

class TenantMapper
{
    public static function toDomain(TenantModel $model): Tenant
    {
        return new Tenant(
            $model->id,
            $model->name,
            $model->host,
            $model->active
        );
    }

    public static function toModel(Tenant $tenant): TenantModel
    {
        return new TenantModel([
            'id' => $tenant->id(),
            'name' => $tenant->name(),
            'active' => $tenant->isActive(),
        ]);
    }
}
