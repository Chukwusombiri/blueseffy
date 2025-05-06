<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FundingDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\DepositApprovalNotification;
use Illuminate\Http\Request;

class FundingDepositController extends Controller
{
    public function index()
    {        
        
        return view('admin.deposits');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                                   
        $wallets = Wallet::select('name','id')->get();       
        return view('admin.adddeposit')->with([
            'wallets'=>$wallets,           
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
            'wallet_id' => ['required','exists:wallets,id'],
        ]);

        $plan = Plan::find($request->plan_id);
        if($request->amount>$plan->max || $request->amount<$plan->min){
            return redirect()->route('admin.deposit.create')->with('error','Inappropriate amount for selected investment plan'); 
        }else{
            
        $deposit = new FundingDeposit();        
        $deposit->amount = $request->amount;
        $deposit->user_id = $request->user_id;        
        $deposit->wallet_id = $request->wallet_id;        
        $deposit->is_approved=true;

        if($deposit->save()){
            $user = user::find($request->user_id);
            $user->doBal =  $user->acBal + $request->amount;           
            $user->update();
            $user->notify(new DepositApprovalNotification($deposit));
            return redirect()->route('admin.deposits')->with('success','deposit created successfully');
            }
        }          
    }
}
