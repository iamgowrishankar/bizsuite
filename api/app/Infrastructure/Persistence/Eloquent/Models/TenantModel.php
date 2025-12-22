<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenantModel extends Model
{
    use HasFactory;

    protected $table = 'tenants';

    protected $fillable = [
        'id',
        'name',
        'host',
        'active',
    ];

    public $incrementing = false;

    protected $keyType = 'string';
}

