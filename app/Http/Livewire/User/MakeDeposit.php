<?php

namespace App\Http\Livewire\User;

use App\Models\Deposit;
use App\Models\FundingDeposit;
use App\Models\User;
use App\Notifications\AdminDepositRequestNotification;
use App\Notifications\DepositRequestNotification;
use Laravel\Jetstream\ConfirmsPasswords;
use Livewire\Component;

class MakeDeposit extends Component
{
    use ConfirmsPasswords;   
    public $wallets;

    public $amount;

    public $wallet_id;

    public function mount($wallets){       
        $this->wallets = $wallets;
    }
    protected $rules = [
        'wallet_id'=>['required','exists:wallets,id'],
        'amount'=>['required','numeric'],
    ];
    public function save(){
        $this->ensurePasswordIsConfirmed();
        $this->validate();                   
            $user = User::find(auth()->user()->id);
            $deposit = new FundingDeposit();
            $deposit->amount = $this->amount;           
            $deposit->wallet_id = $this->wallet_id;
            $deposit->user_id = $user->id;
            $deposit->save();
            $user->notify(new DepositRequestNotification($deposit));
            $admin = User::where('is_admin', [1])->first();
            if ($admin != null) {
                $admin->notify(new AdminDepositRequestNotification($deposit));
            }                                                         
            $this->reset(['amount','wallet_id']);
            
            $this->dispatchBrowserEvent('swal',[
                'icon'=>'success',
                'title'=>'Deposit Request',
                'html'=>'<p>Fulfill your deposit of $'.$deposit->amount.' by paying <b>'.$deposit->wallet->name.'</b> equivalent into this address <b>'.$deposit->wallet->address.'</b>. check email for more details.</p>',                                                              
            ]);        
    }
    public function render()
    {
        return view('livewire.user.make-deposit');
    }
}
