<?php

namespace App\Http\Livewire\Admin;

use App\Models\FundingDeposit;
use App\Models\Plan;
use App\Models\Wallet;
use LivewireUI\Modal\ModalComponent;

class EditDeposit extends ModalComponent
{
    public FundingDeposit $deposit;
    public $amount;
    public $wallet_id;
    public $user_id;  
    public $date;
   
    protected function rules(){
        return [
            'amount'=>'required|numeric|integer',
            'wallet_id'=>'required|exists:wallets,id',   
            'date' => 'required|date',         
        ];
    }
    protected $validationAttributes = [
        'wallet_id' =>'Wallet',
        'plan_id'=>'Investment Plan'
    ];

    public function mount(FundingDeposit $deposit){
        $this->deposit = $deposit;
        $this->wallet_id = $deposit->wallet_id;       
        $this->user_id=$deposit->user_id;
        $this->amount =$deposit->amount;
        $this->date = $this->deposit->created_at;
    }

    public function save(){
        $this->validate();                       
        $deposit = FundingDeposit::find($this->deposit->id);
        $deposit->wallet_id = $this->wallet_id;        
        $deposit->amount = $this->amount;
        $deposit->created_at = $this->date;
        $deposit->save();

        $this->closeModalWithEvents(['editedDeposit']);       
    }
    public function render()
    {
        return view('livewire.admin.edit-deposit',[
            'wallets'=>Wallet::all(),           
        ]);
    }
}
