<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvestmentDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\InvestmentApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Illuminate\Http\Request;

class InvestmentDepositController extends Controller
{
    public function index(){
        return view('admin.investments');
    }

    public function create()
    {                            
        $plans = Plan::all();
        $wallets = Wallet::select('name','id')->get();       
        return view('admin.addinvestment')->with([
            'wallets'=>$wallets,
            'plans'=>$plans,
            'users'=>User::whereNotIn('is_admin',[1])->get(),            
        ]);              
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'amount' => ['required', 'integer','numeric'],
            'user_id' => ['required','exists:users,id'],
            'plan_id' => ['required','exists:plans,id'],
            'wallet_id' => ['exists:wallets,id'],
        ]);

        $plan = Plan::find($request->plan_id);
        $user = user::find($request->user_id);
        if($request->amount>$plan->max || $request->amount<$plan->min){
            return redirect()->route('admin.investment.create')->with('error','Inappropriate amount for selected investment plan'); 
        }else{
            
        if(!$request->has('wallet_id') && $request->amount>$user->doBal){
            return redirect()->route('admin.investment.create')->with('error','Amount exceeds available dormant capital.'); 
        }
        $investment = new InvestmentDeposit();        
        $investment->amount = $request->amount;
        $investment->user_id = $request->user_id;
        $investment->plan_id = $request->plan_id;
        if($request->has('wallet_id')){
            $investment->wallet_id = $request->wallet_id;
        }
        $investment->is_approved=true;

        if($investment->save()){
            $user = user::find($request->user_id);
            $user->acBal =  $user->acBal + $request->amount;
            $user->acROI = $user->acROI + $request->amount;
            $user->totBal = $user->totBal + $request->amount;
            if(!$request->has('wallet_id')){
                $user->doBal = $user->doBal-$request->amount;
            }
            $user->update();
            $user->notify(new InvestmentApprovalNotification($investment));

            if(!empty($user->upline)){
                $referrer = User::find($user->upline->user_id);
                $ref_bonus = Plan::select('ref_commission')->where('id',$investment->plan_id)->value('ref_commission');
                $ref_rate = $investment->amount * $ref_bonus/100;
                $ref_earn = round($ref_rate);
                $referrer->acROI =$referrer->acROI + $ref_earn;
                $referrer->totBal =$referrer->totBal + $ref_earn;
                $referrer->update();
                $referrer->notify(new ReferralIncomeNotification($referrer->name,$investment,$ref_earn));
            }
            
            return redirect()->route('admin.investments')->with('success','investment created successfully');
            }
        }          
    }
}
