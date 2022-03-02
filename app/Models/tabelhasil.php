<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabelhasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'result_id',
        'kode',
        'hasil',
    ];


    public function Result(){
        return $this->belongsTo(Result::class);
    }
}
