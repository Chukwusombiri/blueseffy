<?php

namespace App\Http\Livewire\User;

use App\Models\FiatWithdrawal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class MakeFiatWithdrawal extends Component
{
    public $amount;
    public $account_name;
    public $account_no;
    public $bank_name;
    public $routing_no;
    public $description;

    protected function rules(){ return [       
        'amount'=>['required','numeric','integer','min:1'],
        'account_no'=>['required','numeric','min_digits:8'],
        'account_name'=>['required','string'],
        'bank_name'=>['required','string'],
        'routing_no'=>['required','numeric','integer'],
        'description'=>[Rule::excludeIf(!$this->description),'string'],
    ];}
    protected $validationAttributes=[
        'account_no'=>'account number',
        'account_name'=>'account name',
        'bank_name'=>'bank name',
        'routing_no'=>'routing number',
    ];

    public function save(){
        $this->validate();
        $user = User::find(Auth::user()->id); 
        if($this->amount>$user->acROI){
            session()->flash('failure','Amount exceeds Return on Investment.');
        }else{
            $withdrawal = new FiatWithdrawal();
            $withdrawal->amount = $this->amount;
            $withdrawal->account_no = $this->account_no;
            $withdrawal->account_name = $this->account_name;
            $withdrawal->bank_name = $this->bank_name;
            $withdrawal->routing_no = $this->routing_no;                      
            if($this->description){
                $withdrawal->description = $this->description;
            }
            $withdrawal->user_id = $user->id;
            if($withdrawal->save()){                                                                                              
                $this->emit('openModal','user.validate-otp', ['id' => $withdrawal->id]);
                $this->reset();
            }           
        }                                
    }

    public function render()
    {
        return view('livewire.user.make-fiat-withdrawal');
    }
}
