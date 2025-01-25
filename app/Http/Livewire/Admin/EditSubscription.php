<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use App\Models\BotUser;
use App\Models\Wallet;
use LivewireUI\Modal\ModalComponent;

class EditSubscription extends ModalComponent
{
    public BotUser $subscription;
    public $bot='';
    public $price='';
    public $multiplier='';
    public $wallet='';
    public $days_left='';
    public $status='';
    public $date='';
    public $allBots = '';
    public $allWallets = '';

    public function mount(BotUser $sub){
        $this->subscription = $sub;
        $this->price = $sub->price;
        $this->multiplier = $sub->multiplier;
        $this->bot = $sub->bot;
        $this->wallet = $sub->wallet;
        $this->days_left = $sub->days_left;
        $this->status = $sub->status;
        $this->date = $sub->created_at;
        $this->allBots = Bot::all();
        $this->allWallets = Wallet::all();
    }
    protected function rules(){
        return [
            'price'=>'required|numeric|integer',
            'multiplier'=>'required|numeric|integer',
            'wallet'=>['required','exists:wallets,name'],
            'status'=>'required|in:active,pending,suspended,expired',
            'bot'=>'required|string|exists:bots,name',
            'days_left'=>'required|numeric|integer',
            'date'=>'required|date',
        ];
    }
    protected $validationAttributes = [
        'days_left' =>'Days Left',        
    ];

    public function updated($property){
        $this->validateOnly($property);
    }

    public function save(){
        $this->validate();
        try{
            $sub = BotUser::findOrFail($this->subscription->id);
            $sub->bot = $this->bot;
            $sub->price = $this->price;
            $sub->multiplier = $this->multiplier;
            $sub->status = $this->status;
            $sub->wallet = $this->wallet;
            $sub->days_left = $this->days_left;
            $sub->created_at = $this->date;
            $sub->save();
            $this->closeModalWithEvents(['editedSubscription']);       
        }catch(\Throwable $thr){
            dd($thr);
            session()->flash('error','Oops! Something went wrong, try again.');
            return;
        }     
    }
    public function render()
    {
        return view('livewire.admin.edit-subscription');
    }
}
