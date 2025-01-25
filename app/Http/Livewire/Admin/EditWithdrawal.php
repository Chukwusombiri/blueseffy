<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserWallet;
use App\Models\Withdrawal;
use LivewireUI\Modal\ModalComponent;

class EditWithdrawal extends ModalComponent
{
    public Withdrawal $withdrawal;
    public $amount;
    public $user_wallet_id;
    public $user_id;

    protected function rules(){
        return[
            'amount'=>'required|numeric|integer',
            'user_wallet_id'=>'required|exists:user_wallets,id',
        ];
    }

    protected $validationAttributes=[
        'user_wallet_id'=>'user wallet',
    ];
    
    public function mount(Withdrawal $withdrawal){
        $this->withdrawal = $withdrawal;
        $this->amount = $withdrawal->amount;
        $this->user_id=$withdrawal->user_id;      
        $this->user_wallet_id = $withdrawal->user_wallet_id;  
    }

    public function save(){
        $this->validate();
        if($this->amount>$this->withdrawal->user->acROI){
            session()->flash('result','amount exceeded net income.');
        }else{
            $withdrawal = Withdrawal::find($this->withdrawal->id);
            $withdrawal->amount = $this->amount;
            $withdrawal->user_wallet_id = $this->user_wallet_id;
            $withdrawal->user_id=$this->user_id;
            $withdrawal->update();

            $this->closeModalWithEvents(['editedWithdrawal']);
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-withdrawal',[
            'wallets'=>UserWallet::where('user_id',$this->user_id)->get(),
        ]);
    }
}
