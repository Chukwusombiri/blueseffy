<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDashBoardController extends Controller
{
    public function dashboard(){       
        $user = User::find(auth()->user()->id);                                        
        $lastDeposit = $user->fundingDeposits()->where('is_approved',[1])->orderByDesc('funding_deposits.created_at')->limit(1)->value('amount');  
        $lastInvestment = $user->investmentDeposits()->where('is_approved',[1])->orderByDesc('investment_deposits.created_at')->limit(1)->value('amount');                           
        $lastWithdrawal= $user->withdrawals()->where('is_approved',[1])->orderByDesc('withdrawals.created_at')->limit(1)->value('amount');                   
        $lastRefIncome = $user->referralIncomes()->orderByDesc('referral_incomes.created_at')->limit(1)->value('amount');        
        $newtransactions = collect();
        $deposits = $user->fundingDeposits()->where('is_approved',[1])->get();
        $investments = $user->investmentDeposits()->where('is_approved',[1])->get();
        $withdrawals = $user->withdrawals()->where('is_approved',[1])->get();
        $fwithdrawals = $user->fiatWithdrawals()->where('is_approved',[1])->get();
        $newtransactions = $newtransactions->merge($investments)->merge($deposits)->merge($withdrawals)->merge($fwithdrawals)
        ->sortByDesc('created_at')->values()->take(7);   
        $prevInvestment = null;
        $activeInvestment = null;
        if($user->investmentDeposits()->exists() && auth()->user()->percent === 0){
            $prevInvestment = $user->investmentDeposits()->orderByDesc('updated_at')->take(1)->with('plan')->get()->first();
        }elseif($user->investmentDeposits()->exists() && auth()->user()->percent > 0){
            $activeInvestment = $user->investmentDeposits()->orderByDesc('updated_at')->take(1)->with('plan')->get()->first();
        }
        
        return view('user.dashboard')->with([
            'user'=>$user,                        
            'lastDeposit'=>$lastDeposit,
            'lastInvestment'=>$lastInvestment,
            'lastWithdrawal'=>$lastWithdrawal,
            'lastRefIncome' =>$lastRefIncome,           
            'newtransactions'=>$newtransactions,  
            'prevInvestment' => $prevInvestment,
            'activeInvestment' => $activeInvestment,
        ]);
    }
    
  
    public function refincome(){
        $user = User::find(auth()->user()->id);
        $refincomes = $user->referralIncomes()->orderByDesc('referral_incomes.id')->get();       
        return view('user.refincomes')->with([
            'user'=>$user,
            'refincomes'=>$refincomes,
        ]);
    }

    public function downline(){
        $user = User::find(auth()->user()->id);
        $downlines = $user->mydownlines()->get();       
        return view('user.downlines')->with([
            'user'=>$user,
            'downlines'=>$downlines,
        ]);
    }
  
}
