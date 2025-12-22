<?php

namespace App\Domain\Auth\Entities;

final class User
{
    private string $id;
    private string $email;
    private string $tenantId;

    public function __construct(
        string $id,
        string $email,
        string $tenantId
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->tenantId = $tenantId;
    }

    public function tenantId(): string
    {
        return $this->tenantId;
    }
}
