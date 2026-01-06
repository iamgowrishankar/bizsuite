<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class HandleInvoiceCreated implements ShouldQueue
{
    public function handle(InvoiceCreated $event): void
    {
        Log::info('Invoice created', [
            'invoice_id' => $event->invoice->id(),
            'tenant_id'  => $event->invoice->tenantId(),
            'amount'     => $event->invoice->amount(),
        ]);
    }
}
