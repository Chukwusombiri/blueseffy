<?php

namespace App\Http\Livewire\Admin;

use App\Models\InvestmentDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditInvestment extends ModalComponent
{
    public $investment;
    public $amount;
    public $wallet_id;
    public $user_id;
    public $plan_id;
    public $date;

   
    protected function rules(){
        return [
            'amount'=>'required|numeric|integer',
            'wallet_id'=>[Rule::excludeIf(!$this->wallet_id),'exists:wallets,id'],
            'plan_id'=>'required|exists:plans,id',
            'date' => 'required|date',
        ];
    }
    protected $validationAttributes = [
        'wallet_id' =>'Wallet',
        'plan_id'=>'Investment Plan'
    ];

    public function mount($id){
        $this->investment = InvestmentDeposit::find($id);
        $this->wallet_id = $this->investment->wallet_id;
        $this->plan_id=$this->investment->plan_id;
        $this->user_id=$this->investment->user_id;
        $this->amount =$this->investment->amount;
        $this->date = $this->investment->created_at;
    }

    public function save(){
        $this->validate();
        $user = User::find($this->user_id);
        $plan=Plan::find($this->plan_id);
        $investment = InvestmentDeposit::find($this->investment->id);
        if($this->amount>$plan->max || $plan->min>$this->amount){
            session()->flash('result','inappropriate amount for selected plan');

        }else if(!$investment->wallet_id){
            if($this->amount > $user->doBal){
                session()->flash('result','Amount exceeds available dormant capital');
            }else{                
                $investment->plan_id = $this->plan_id;
                $investment->amount = $this->amount;
                $investment->created_at = $this->date;
                $investment->save();

                $this->closeModalWithEvents(['editedInvestment']);
            }         
        }else{
            
            $investment->wallet_id = $this->wallet_id;
            $investment->plan_id = $this->plan_id;
            $investment->amount = $this->amount;
            $investment->created_at = $this->date;
            $investment->save();

            $this->closeModalWithEvents(['editedInvestment']);
        }
    } 

    public function render()
    {
        return view('livewire.admin.edit-investment',[
            'wallets'=>Wallet::all(),
            'plans'=>Plan::all(),
        ]);
    }
}
