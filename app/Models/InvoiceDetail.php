<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'invoice_id',
        'result_id',
        'user_id',
        'kode',
        'posisi',
        'data',
        'amount',
        'hadiah',
        'diskon',
        'kei',
        'total',
        'tgl_beli',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
