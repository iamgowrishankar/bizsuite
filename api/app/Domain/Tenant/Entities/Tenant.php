<?php

namespace App\Domain\Tenant\Entities;

final class Tenant
{
    private string $id;
    private string $name;
    private bool $active;

    public function __construct(
        string $id,
        string $name,
        bool $active = true
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->active = $active;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function deactivate(): void
    {
        $this->active = false;
    }
}
