<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'id',
        'tenant_id',
        'number',
        'amount',
        'status',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
