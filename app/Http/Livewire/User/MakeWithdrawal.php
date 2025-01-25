<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\AdminWithdrawalRequestNotification;
use App\Notifications\WithdrawalRequestNotification;
use Laravel\Jetstream\ConfirmsPasswords;
use Livewire\Component;

class MakeWithdrawal extends Component
{
    use ConfirmsPasswords;
    public $userwallets;

    public $acROI;

    public $acBal;

    public $user;

    public $amount;

    public $user_wallet_id;

    protected $listeners =[
        'addedUserWallet'=>'$refresh',
    ];

    public function mount($userwallets,$acROI,$acBal,$user){
        $this->fill([
            'userwallets'=>$userwallets,
            'acROI'=>$acROI,
            'acBal'=>$acBal,
            'user'=>$user
        ]);
    }

    protected $rules=[
        'user_wallet_id'=>['required','exists:user_wallets,id'],
        'amount'=>['required','numeric'],
    ];

    public function save(){
        $this->ensurePasswordIsConfirmed();
        $this->validate();
        if($this->amount > $this->acROI){                
            session()->flash('error','Amount exceeeded account value');           
        }else{
            $withdrawal = new Withdrawal();
            $withdrawal->amount = $this->amount;                
            $withdrawal->user_wallet_id = $this->user_wallet_id;
            $withdrawal->user_id = $this->user->id;
            $withdrawal->save();                            
            $this->user->notify(new WithdrawalRequestNotification($withdrawal));
            $admin = User::where('is_admin',[1])->first();
            if($admin != null){
                $admin->notify(new AdminWithdrawalRequestNotification($withdrawal));
            }
            $this->reset(['amount','user_wallet_id']);

            $this->dispatchBrowserEvent('swalwit',[
                'title'=>'Successful Withdrawal',
                'html'=>'<p>Withdrawal is been previewed and will be released shortly into your designated wallet address. <br>check email for more details.</p>', 
                'icon'=>'success',                                               
            ]);
        }                              
    }


    public function render()
    {
        return view('livewire.user.make-withdrawal');
    }
}
