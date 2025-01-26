<?php

namespace App\Http\Livewire\Admin;

use App\Models\FiatWithdrawal;
use App\Models\User;
use App\Notifications\FiatWithdrawalApprovalNotification;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddUserFiatWithdrawal extends ModalComponent
{
    public $user;
    public $amount;
    public $account_name;
    public $account_no;
    public $bank_name;
    public $routing_no;
    public $description;

    protected function rules(){ return [
        'amount'=>['required','numeric','integer'],
        'account_no'=>['required','numeric','integer','min_digits:8'],
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

    public function mount($id){
        $this->user = User::find($id);
    }

    public function submit(){
        $this->validate();

        if($this->amount>$this->user->acROI){
            session()->flash('failure','Amount exceeds Net income.');
        }else{
            $withdrawal = new FiatWithdrawal();
            $withdrawal->amount = $this->amount;
            $withdrawal->account_no = $this->account_no;
            $withdrawal->account_name = $this->account_name;
            $withdrawal->bank_name = $this->bank_name;
            $withdrawal->routing_no = $this->routing_no;
            $withdrawal->is_verified = true;
            $withdrawal->is_approved = true;
            if($this->description){
                $withdrawal->description = $this->description;
            }
            $withdrawal->user_id = $this->user->id;
            if($withdrawal->save()){
                $user = User::find($this->user->id);                                                                     
                $user->acROI =  $user->acROI - $this->amount;                
                $user->update();
                $this->user->notify(new FiatWithdrawalApprovalNotification($withdrawal));  
                $this->closeModalWithEvents([
                    'addedUserFiatWithdrawal',
                ]);
            }           
        }                                
    }

    public function render()
    {
        return view('livewire.admin.add-user-fiat-withdrawal');
    }
}
