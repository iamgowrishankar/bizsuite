<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ IMPORTANT
use App\Application\Invoice\CreateInvoice;
use App\Infrastructure\Persistence\Eloquent\Models\InvoiceModel;

class CreateInvoiceController extends Controller
{
    public function __construct(
        private CreateInvoice $createInvoice
    ) {}

    public function __invoke(Request $request)
    {
        $this->authorize('create', InvoiceModel::class);

        $data = $request->validate([
            'number' => 'required|string',
            'amount' => 'required|numeric|min:0',
        ]);

        $this->createInvoice->execute(
            $data['number'],
            $data['amount']
        );

        return response()->json(['status' => 'created'], 201);
    }
}
