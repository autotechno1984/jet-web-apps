<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'games',
        'limit',
        'tgl_ubah'
    ];
}
