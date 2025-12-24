<?php

namespace App\Domain\Invoice\Entities;

final class Invoice
{
    private string $id;
    private string $tenantId;
    private string $number;
    private float $amount;
    private string $status;

    public function __construct(
        string $id,
        string $tenantId,
        string $number,
        float $amount,
        string $status = 'draft'
    ) {
        $this->id = $id;
        $this->tenantId = $tenantId;
        $this->number = $number;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function issue(): void
    {
        if ($this->status !== 'draft') {
            throw new \DomainException('Invoice already issued');
        }

        $this->status = 'issued';
    }

    public function id(): string { return $this->id; }
    public function tenantId(): string { return $this->tenantId; }
    public function number(): string { return $this->number; }
    public function amount(): float { return $this->amount; }
    public function status(): string { return $this->status; }
}
