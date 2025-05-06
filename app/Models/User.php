<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_admin',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function myDownlines(){
        return $this->hasMany('App\Models\Downline','user_id');
    }

    public function upline(){
        return $this->hasOne('App\Models\Downline','downline_id');
    }

    public function investmentDeposits(){
        return $this->hasMany('App\Models\InvestmentDeposit','user_id');
    }

    public function fundingDeposits(){
        return $this->hasMany('App\Models\FundingDeposit','user_id');
    }

    public function referralIncomes(){
        return $this->hasMany('App\Models\ReferralIncome','user_id');
    }

    public function withdrawals(){
        return $this->hasMany('App\Models\Withdrawal');
    }

    public function fiatWithdrawals(){
        return $this->hasMany('App\Models\FiatWithdrawal');
    }

    public function userwallets(){
        return $this->hasMany('App\Models\UserWallet');
    }

    public function promos(){
        return $this->hasMany('App\Models\Promo');
    }

    public function contact(){
        return $this->hasOne('App\Models\Contact','user_id');
    }

    public function userBots(){
        return $this->hasMany(BotUser::class);
    }
}
