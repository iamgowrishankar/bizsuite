<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Invoice\Contracts\InvoiceRepository;
use App\Domain\Invoice\Entities\Invoice;
use App\Infrastructure\Persistence\Eloquent\Models\InvoiceModel;
use App\Infrastructure\Persistence\Mappers\InvoiceMapper;

class EloquentInvoiceRepository implements InvoiceRepository
{
    public function save(Invoice $invoice): void
    {
        InvoiceModel::updateOrCreate(
            ['id' => $invoice->id()],
            [
                'tenant_id' => $invoice->tenantId(),
                'number' => $invoice->number(),
                'amount' => $invoice->amount(),
                'status' => $invoice->status(),
            ]
        );
    }

    public function findById(string $id): ?Invoice
    {
        $model = InvoiceModel::find($id);

        return $model
            ? InvoiceMapper::toDomain($model)
            : null;
    }
}
