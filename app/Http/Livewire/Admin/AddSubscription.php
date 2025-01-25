<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use App\Models\BotUser;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddSubscription extends Component
{
    public $bot='';
    public $price='';
    public $wallet='';
    public $days_left='';
    public $status='';
    public $multiplier='';
    public $allBots = '';
    public $allWallets = '';
    public $selectedUser;
    public $users;
    public $search = '';


    public function mount(){        
        $this->allBots = Bot::all();
        $this->allWallets = Wallet::all();  
        $this->users = [];      
    }
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

    public function updatedSearch($value)
    {
        $this->users = User::where('name', 'like', '%' . $value . '%')->get();
    }

    public function selectUser($id)
    {        
        $this->selectedUser = User::findOrFail($id);    
        $this->search = $this->selectedUser->name;
        $this->users = [];
    }

    public function clear()
    {
        $this->search = '';
        $this->users = [];
        $this->selectedUser = null;
    }

    public function save(){                
        $this->validate();      
        try{
            $sub = new BotUser();
            $sub->bot = $this->bot;
            $sub->user_id = $this->selectedUser->id;
            $sub->price = $this->price;
            $sub->status = $this->status;
            $sub->wallet = $this->wallet;
            $sub->multiplier = $this->multiplier;
            $sub->days_left = $this->days_left;
            $sub->save();
            return redirect('/admin/subscriptions')->with('success','Good job! Bot subscription was successful');      
        }catch(\Throwable $thr){
            dd($thr);
            session()->flash('error','Oops! Something went wrong, try again.');
            return;
        }     
    }
    public function render()
    {
        return view('livewire.admin.add-subscription');
    }
}
