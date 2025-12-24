<?php

namespace App\Domain\Invoice\Contracts;

use App\Domain\Invoice\Entities\Invoice;

interface InvoiceRepository
{
    public function save(Invoice $invoice): void;

    public function findById(string $id): ?Invoice;
}
