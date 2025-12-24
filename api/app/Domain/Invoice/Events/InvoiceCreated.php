<?php

namespace App\Domain\Invoice\Events;

use App\Domain\Invoice\Entities\Invoice;

final class InvoiceCreated
{
    public function __construct(
        public readonly Invoice $invoice,
        public readonly string $tenantId
    ) {}
}
