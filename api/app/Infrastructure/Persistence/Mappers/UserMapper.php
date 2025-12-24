<?php

namespace App\Infrastructure\Persistence\Mappers;

use App\Domain\Auth\Entities\User;
use App\Infrastructure\Persistence\Eloquent\Models\UserModel;

class UserMapper
{
    public static function toDomain(UserModel $model): User
    {
        return new User(
            $model->id,
            $model->email,
            $model->tenant_id,
            $model->role
        );
    }
}
