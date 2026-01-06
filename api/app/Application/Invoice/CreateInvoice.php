<?php

namespace App\Application\Invoice;

use App\Events\InvoiceCreated;
use App\Domain\Invoice\Contracts\InvoiceRepository;
use App\Domain\Invoice\Entities\Invoice;
use App\Application\Tenant\TenantContext;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

class CreateInvoice
{
    public function __construct(
        private InvoiceRepository $invoices
    ) {}

    public function execute(string $number, float $amount): void
    {
        $tenant = TenantContext::get();

        $invoice = new Invoice(
            (string) Str::uuid(),
            $tenant->id(),
            $number,
            $amount
        );

        $this->invoices->save($invoice);

        Event::dispatch(new InvoiceCreated($invoice));
    }
}
