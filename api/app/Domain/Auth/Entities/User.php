<?php

namespace App\Domain\Auth\Entities;

final class User
{
    private string $id;
    private string $email;
    private string $tenantId;
    private string $role;

    public function __construct(
        string $id,
        string $email,
        string $role,
        string $tenantId
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->role = $role;
        $this->tenantId = $tenantId;
    }

    public function tenantId(): string
    {
        return $this->tenantId;
    }

    public function role(): string
    {
        return $this->role;
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['owner', 'admin']);
    }
}
