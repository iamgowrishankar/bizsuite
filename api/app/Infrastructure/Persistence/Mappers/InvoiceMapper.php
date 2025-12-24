<?php

namespace App\Infrastructure\Persistence\Mappers;

use App\Domain\Invoice\Entities\Invoice;
use App\Infrastructure\Persistence\Eloquent\Models\InvoiceModel;

class InvoiceMapper
{
    public static function toDomain(InvoiceModel $model): Invoice
    {
        return new Invoice(
            $model->id,
            $model->tenant_id,
            $model->number,
            (float) $model->amount,
            $model->status
        );
    }

    public static function toModel(Invoice $invoice): InvoiceModel
    {
        return new InvoiceModel([
            'id' => $invoice->id(),
            'tenant_id' => $invoice->tenantId(),
            'number' => $invoice->number(),
            'amount' => $invoice->amount(),
            'status' => $invoice->status(),
        ]);
    }
}
