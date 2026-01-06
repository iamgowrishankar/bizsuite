<?php

namespace App\Events;

use App\Domain\Invoice\Entities\Invoice;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Invoice $invoice
    ) {}
}
