<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'password',
        'is_admin',
        'referallid',
        'uplineid',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){

        return $this->hasOne(Profile::class);

    }

    public function userbank(){
        return $this->hasMany(userBankDetail::class,'user_id', 'id');
    }

    public function transaksi(){
        return $this->belongsTo(transaksidepowd::class,'user_id');
    }

    public function invoicedetail(){
        return $this->belongsTo(InvoiceDetail::class, 'user_id','id');
    }


}
