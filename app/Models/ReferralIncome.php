<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralIncome extends Model
{
    use HasFactory,BelongsToUser,HasUuids;

    public function downline(){
        return $this->belongsTo(User::class,'downline_id','id');
    }
}
