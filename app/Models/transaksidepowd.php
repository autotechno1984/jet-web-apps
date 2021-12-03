<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksidepowd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori',
        'bank',
        'akun_bank',
        'nama_bank',
        'amount',
        'id_bank_detail',
        'user_bank_detail',
        'user_bank',
        'user_nomor_bank',
        'nama_akun_bank',
        'status',
        'catatan',
        'approvedby',
        'date_approved',
        'data_request',
        'created_at',
        'updated_at',

    ];
    public function user() {
        return $this->hasMany(User::class,'id','user_id');
    }
}
