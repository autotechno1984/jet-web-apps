<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userBankDetail extends Model
{
    use HasFactory;

    public function bankUser(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
