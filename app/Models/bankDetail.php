<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankDetail extends Model
{
    use HasFactory;

    public function Bank()
    {
        return $this->belongsTo(bank::class,'bank_id', 'id');
    }

}
