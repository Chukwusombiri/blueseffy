<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FiatWithdrawal extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'is_verified',        
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function otp(){
        return $this->hasOne('App\Models\Otp');
    }
}
