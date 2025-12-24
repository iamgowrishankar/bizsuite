<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Auth\Contracts\UserRepository;
use App\Domain\Auth\Entities\User;
use App\Infrastructure\Persistence\Eloquent\Models\UserModel;
use App\Infrastructure\Persistence\Mappers\UserMapper;

class EloquentUserRepository implements UserRepository
{
    public function findByEmailAndTenant(
        string $email,
        string $tenantId
    ): ?User {
        $model = UserModel::where('email', $email)
            ->where('tenant_id', $tenantId)
            ->first();

        return $model
            ? UserMapper::toDomain($model)
            : null;
    }
}
