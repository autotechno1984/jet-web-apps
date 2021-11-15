<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
