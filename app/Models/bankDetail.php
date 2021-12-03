<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankDetail extends Model
{


    use HasFactory;


    protected $fillable = [
        'bank_id',
        'nama',
        'nama_bank',
        'nomor_akun',

    ];
    public function Bank()
    {
        return $this->belongsTo(bank::class,'bank_id', 'id');
    }
    public function transaksi()
    {
        return $this->belongsTo(transaksidepowd::class,'id_bank_detail', 'id');
    }

}
