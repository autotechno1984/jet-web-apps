<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'result_id',
        'kode',
        'posisi',
        'data',
        'total',
    ];
}
