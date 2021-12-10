<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected  $fillable = [
        'market_id',
        'periode',
        'kode',
        'pasaran',
        'jam_tutup',
        'status'
    ];

    public function result_details(){
        return $this->hasMany(ResultDetail::class);
    }

    public function tabelhasil(){
        return $this->hasMany(tabelhasil::class);
    }


}
