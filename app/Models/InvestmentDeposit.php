<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentDeposit extends Model
{
    use HasFactory,HasUuids,BelongsToUser;

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }

    public function plan(){
        return $this->belongsTo('App\Models\Plan','plan_id');
    }
}
