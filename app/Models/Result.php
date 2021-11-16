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
    ];

    public function result_details(){
        return $this->hasMany(ResultDetail::class);
    }

}