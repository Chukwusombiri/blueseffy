<?php

namespace App\Http\Livewire\Admin;

use App\Models\InvestmentDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\InvestmentApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddUserInvestment extends ModalComponent
{
    public $user;
    public $amount;
    public $wallet_id;
    public $plan_id;

    protected function rules(){
        return[
            'amount' => ['required', 'integer','numeric'],        
            'plan_id' => ['required','exists:plans,id'],
            'wallet_id' => [Rule::excludeIf(!$this->wallet_id),'exists:wallets,id'],
        ];
        
    } 
    protected $validationAttributes=[
        'plan_id' =>'Investment Plan',
        'wallet_id'=>'Wallet',
    ];

    public function mount($id){
        $this->user = User::find($id);
    }

    public function submit(){
        $this->validate();

        $plan = Plan::find($this->plan_id);   
        $user = user::find($this->user->id);     
        if($this->amount>$plan->max || $this->amount<$plan->min){
            session()->flash('failure', 'enter a valid amount for selected plan.');
        }else if(!$this->wallet_id && $this->amount>$user->doBal){
            session()->flash('failure', 'Amount exceeds available funds.');
        }else{
            $deposit = new InvestmentDeposit();
            $deposit->amount  = $this->amount;
            $deposit->plan_id =  $this->plan_id;
            if($this->wallet_id){
                $deposit->wallet_id = $this->wallet_id;
            }
            $deposit->is_approved = true;
            $deposit->user_id = $this->user->id;

            if($deposit->save()){                
                $user->acBal =  $user->acBal + $this->amount;
                $user->acROI = $user->acROI + $this->amount;      
                $user->totBal = $user->totBal + $this->amount;     
                if(!$this->wallet_id){
                    $user->doBal = $user->doBal - $this->amount;      
                }    
                $user->percent = 1;  
                $user->status = 'earning';     
                $user->update();
                $user->notify(new InvestmentApprovalNotification($deposit));
    
                if(!empty($user->upline)){
                    $referrer = User::find($user->upline->user_id);
                    $ref_bonus = Plan::select('ref_commission')->where('id',$deposit->plan_id)->value('ref_commission');
                    $ref_rate = $deposit->amount * $ref_bonus/100;
                    $ref_earn = round($ref_rate);
                    $referrer->acROI =$referrer->acROI + $ref_earn;
                    $referrer->update();
                    $referrer->notify(new ReferralIncomeNotification($referrer->name,$deposit,$ref_earn));
                }
                               
                $this->closeModalWithEvents(['addedInvestment']);
                }
        }
    }

    public function render()
    {
        return view('livewire.admin.add-user-investment',[
            'wallets'=>Wallet::all(),
            'plans'=>Plan::all(),
        ]);
    }
}
