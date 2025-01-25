<?php

namespace App\Http\Livewire\User;

use App\Models\InvestmentDeposit;
use App\Models\User;
use App\Notifications\AdminInvestmentRequestNotification;
use App\Notifications\InvestmentRequestNotification;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\ConfirmsPasswords;
use Livewire\Component;

class MakeInvestment extends Component
{ 
    use ConfirmsPasswords;
    public $plan;
    public $user;
    public $wallets;

    public $amount;

    public $wallet_id;

    public $source = 'crypto';

    public function mount($plan, $wallets,$user){
        $this->plan = $plan;
        $this->wallets = $wallets;
        $this->user = $user;
    }
    protected function rules(){
        return [
            'wallet_id'=>[Rule::excludeIf(!$this->wallet_id),'exists:wallets,id'],
            'amount'=>['required','numeric'],
        ];
    } 

    protected $validationAttributes=[
        'wallet_id'=>'Wallet Address'
    ];
    public function save(){
        $this->ensurePasswordIsConfirmed();
        $this->validate();                
        if($this->amount< $this->plan->min || $this->amount>$this->plan->max){                       
            session()->flash('error', 'Inappropriate amount for '.$this->plan->name.' plan');
           
        }else if($this->source==='funds' && $this->amount>$this->user->doBal){
            session()->flash('error', 'Amount exceeds available funds');
           
        }else if($this->source==='crypto' && !$this->wallet_id){
            session()->flash('error', 'Wallet must be selected');
        }else{
            $user = User::find(auth()->user()->id);
            $investment = new InvestmentDeposit();
            $investment->amount = $this->amount;
            $investment->plan_id = $this->plan->id;
            if($this->source=='crypto'){
              $investment->wallet_id = $this->wallet_id;
            }           
            $investment->user_id = $user->id;
            $investment->save();
            if($this->source=='crypto'){
                $user->notify(new InvestmentRequestNotification($investment));
            }
            $admin = User::where('is_admin', [1])->first();
            if ($admin != null) {
                $admin->notify(new AdminInvestmentRequestNotification($investment));
            }                                                         
            $this->reset(['amount','wallet_id']);
            
           if($this->source==='crypto'){
            $this->dispatchBrowserEvent('swal',[
                'icon'=>'success',
                'title'=>'Investment Request',
                'html'=>'<p>Fulfill your investment of $'.$investment->amount.' by paying <b>'.$investment->wallet->name.'</b> equivalent into this address <b>'.$investment->wallet->address.'</b>. check email for more details.</p>',                                                              
            ]);
           }else{
            $this->dispatchBrowserEvent('swal',[
                'icon'=>'success',
                'title'=>'Investment Request',
                'html'=>'<p>Your investment request of $'.$investment->amount.' was successful and currently under review. Do well to check your dashboard for confirmation of investment. check email for more details.</p>',                                                              
            ]);
           }
        }     
    }
    public function render()
    {
        return view('livewire.user.make-investment');
    }
}
