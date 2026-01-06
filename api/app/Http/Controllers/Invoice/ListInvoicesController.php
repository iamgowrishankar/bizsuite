<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application\Invoice\Queries\ListInvoices;

class ListInvoicesController extends Controller
{
    public function __construct(
        private ListInvoices $listInvoices
    ) {}

    public function __invoke(Request $request)
    {
        return response()->json(
            $this->listInvoices->execute(
                perPage: $request->integer('per_page', 10)
            )
        );
    }
}
