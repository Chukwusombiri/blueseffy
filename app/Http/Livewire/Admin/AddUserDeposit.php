<?php

namespace App\Http\Livewire\Admin;

use App\Models\FundingDeposit;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\DepositApprovalNotification;
use LivewireUI\Modal\ModalComponent;

class AddUserDeposit extends ModalComponent
{   
    public $user;
    public $amount;
    public $wallet_id;

    protected $rules=[
        'amount' => ['required', 'integer','numeric'],                
        'wallet_id' => ['required','exists:wallets,id'],
    ];
    
    protected $validationAttributes=[       
        'wallet_id'=>'Wallet',
    ];

    public function mount($id){
        $this->user = User::find($id);
    }

    public function submit(){
        $this->validate();
              
        $deposit = new FundingDeposit();
        $deposit->amount  = $this->amount;
        $deposit->wallet_id = $this->wallet_id;
        $deposit->is_approved = true;
        $deposit->user_id = $this->user->id;

        if($deposit->save()){
            $user = user::find($this->user->id);                
            $user->doBal = $user->doBal + $this->amount;                
            $user->update();
            $user->notify(new DepositApprovalNotification($deposit));
            
            $this->closeModalWithEvents(['addedDeposit']);
            }      
    }

    public function render()
    {
        return view('livewire.admin.add-user-deposit',[
            'wallets'=>Wallet::all(),            
        ]);
    }
}
