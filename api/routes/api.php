<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Invoice\CreateInvoiceController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);

Route::middleware(['auth:sanctum', 'tenant.user'])->group(function () {
    Route::get('/me', function () {
        return request()->user();
    });
});

Route::middleware(['auth:sanctum', 'tenant.user'])->group(function () {
    Route::get('/me', function () {
        return response()->json([
            'id' => request()->user()->id,
            'email' => request()->user()->email,
            'tenant_id' => request()->user()->tenant_id,
        ]);
    });
});

Route::middleware(['auth:sanctum', 'tenant.user'])->group(function () {
    Route::post('/invoices', CreateInvoiceController::class);
});
