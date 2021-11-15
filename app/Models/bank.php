<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'nama'
    ];

    public function bankDetail(){
        return $this->hasMany(bankDetail::class,'bank_id', 'id');
    }

}
