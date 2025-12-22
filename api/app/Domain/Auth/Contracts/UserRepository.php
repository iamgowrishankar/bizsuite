<?php

namespace App\Domain\Auth\Contracts;

use App\Domain\Auth\Entities\User;

interface UserRepository
{
    public function findByEmail(string $email): ?User;
}
