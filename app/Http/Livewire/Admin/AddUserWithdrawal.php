<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use LivewireUI\Modal\ModalComponent;

class AddUserWithdrawal extends ModalComponent
{
    public User $user;
    public $amount;
    public $wallet_id;
    
    protected $listeners = ['addedUserWallet'=>'$refresh'];

    protected $rules=[
        'amount'=>['required','integer','numeric'],
        'wallet_id'=>['required','exists:user_wallets,id'],       
    ];

    protected $validationAttributes=[        
        'wallet_id'=>'wallet address',       
    ];
   
    public function mount(User $user){
        $this->user = $user;
    }

    public function submit(){
        $this->validate();
        if($this->amount>$this->user->acROI){
            session()->flash('result','Amount exceeds Net Income.');
        }else{
            $withdrawal = new Withdrawal();        
            $withdrawal->amount = $this->amount;
            $withdrawal->user_id = $this->user->id;
            $withdrawal->user_wallet_id = $this->wallet_id;        
            $withdrawal->is_approved = true;
            $withdrawal->is_verified = true;
    
            if($withdrawal->save()){
                $user = User::find($this->user->id);                                                                     
                $user->acROI =  $user->acROI - $this->amount;                
                $user->update();            
                $user->notify(new WithdrawalApprovalNotification($withdrawal));                
                $this->closeModalWithEvents([
                    'addedUserWithdrawal',
                ]);        
            }         
        }              
    }

    public function render()
    {
        return view('livewire.admin.add-user-withdrawal',[
            'wallets'=>UserWallet::where('user_id',$this->user->id)->get(),                      
        ]);
    }
}
