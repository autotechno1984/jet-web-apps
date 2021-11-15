<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'handphone',
        'alamat',
        'provinsi',
        'kota',
        'kodekota',
        'kelurahan',
        'kecamatan',
        'rtrw',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }



}
