<?php

namespace App\Domain\Auth\Contracts;

use App\Domain\Auth\Entities\User;

interface UserRepository
{
    public function findByEmailAndTenant(string $email, string $tenantId): ?User;
}
