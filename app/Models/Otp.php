<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FiatWithdrawal;
use App\Traits\BelongsToUser;

class Otp extends Model
{
    use HasFactory,BelongsToUser;

    public function fiatWithdrawal(){
        $this->belongsTo(FiatWithdrawal::class,'fiat_withdrawal_id');
    }
    
}
