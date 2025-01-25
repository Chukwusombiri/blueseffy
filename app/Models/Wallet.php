<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory,HasUuids;

    public function fundingDeposits(){
        return $this->hasMany('App\Models\FundingDeposit','wallet_id');
    }

    public function investmentDeposits(){
        return $this->hasMany('App\Models\InvestmentDeposit','wallet_id');
    }
}
