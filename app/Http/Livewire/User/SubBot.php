<?php

namespace App\Http\Livewire\User;

use App\Mail\SubscriptionMail;
use App\Models\Bot;
use App\Models\BotUser;
use App\Models\Wallet;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubBot extends Component
{
    public Bot $bot;
    public $wallets =[];     
    public $selectedWalletId='';

    protected $rules = [
        'selectedWalletId' => ['required','exists:wallets,id']
    ];

    protected $validationAttributes = [
        'selectedWalletId' => 'Payment currency'
    ];

    public function mount($sentbot){
        $this->bot = Bot::find($sentbot);       
        $this->wallets =  Wallet::all();     
    }

    public function submit(){
        $this->validate();        
        try{
            $wallet = Wallet::findOrFail($this->selectedWalletId);
            $botuser = BotUser::create([
                'user_id'=>auth()->user()->id,
                'bot'=>$this->bot->name,
                'days_left'=>$this->bot->duration, 
                'wallet'=>$wallet->name,
                'price'=>$this->bot->price,
                'multiplier'=>$this->bot->multiplier,
            ]);
            Mail::to(auth()->user()->email)->send(new SubscriptionMail($botuser,$wallet->address));
            $msg = 'Check your registered email for details on how to complete your subscription OR simply deposit $'.$this->bot->price.' '.$wallet->name.' into this wallet address <strong>'.$wallet->address.'</strong>';            
            return redirect()->route('user.mybots')->with('notify',$msg);
        }catch(\Throwable $thr){
            dd($thr);
            session()->flash('error','Oops! Something\'s not right, Try again.');
            $this->reset();
            return;
        }
    }

    public function render()
    {
        return view('livewire.user.sub-bot');
    }
}
