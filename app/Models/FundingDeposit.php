<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingDeposit extends Model
{
    use HasFactory,BelongsToUser,HasUuids;

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }
}
