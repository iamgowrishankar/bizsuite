<?php

namespace App\Application\Invoice\Queries;

use App\Application\Tenant\TenantContext;
use App\Infrastructure\Persistence\Eloquent\Models\InvoiceModel;

class ListInvoices
{
    public function execute(int $perPage = 10)
    {
        $tenant = TenantContext::get();

        return InvoiceModel::query()
            ->where('tenant_id', $tenant->id())
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
}
