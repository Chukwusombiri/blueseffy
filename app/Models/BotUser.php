<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'multiplier',
        'price',
        'wallet',
        'days_left',
        'bot',
        'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
