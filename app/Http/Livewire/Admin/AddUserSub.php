<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use App\Models\BotUser;
use App\Models\User;
use App\Models\Wallet;
use LivewireUI\Modal\ModalComponent;

class AddUserSub extends ModalComponent
{
    public $user;
    public $bot='';
    public $price='';
    public $wallet='';
    public $days_left='';
    public $status='';
    public $multiplier='';
    public $allBots = '';
    public $allWallets = '';

    protected function rules(){
        return [            
            'price'=>'required|numeric|integer',
            'multiplier'=>'required|numeric|integer',
            'wallet'=>['required','exists:wallets,name'],
            'status'=>'required|in:active,pending,suspended,expired',
            'bot'=>'required|string|exists:bots,name',
            'days_left'=>'required|numeric|integer',            
        ];
    }
    protected $validationAttributes = [
        'days_left' =>'Days Left',        
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->allBots = Bot::all();
        $this->allWallets = Wallet::all();
    }

    public function save(){                
        $this->validate();      
        try{
            $sub = new BotUser();
            $sub->bot = $this->bot;
            $sub->user_id = $this->user->id;
            $sub->price = $this->price;
            $sub->status = $this->status;
            $sub->wallet = $this->wallet;
            $sub->multiplier = $this->multiplier;
            $sub->days_left = $this->days_left;
            $sub->save();
            $this->closeModalWithEvents(['addedUserSub'])      ;
        }catch(\Throwable $thr){            
            session()->flash('error','Oops! Something went wrong, try again.');
            return;
        }     
    }

    public function render()
    {
        return view('livewire.admin.add-user-sub');
    }
}
