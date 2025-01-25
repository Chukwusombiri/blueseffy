<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory,HasUuids,BelongsToUser;

    public function userWallet(){
        return $this->belongsTo('App\Models\UserWallet','user_wallet_id');
    }
}
