<?php

namespace App\Http\Livewire\Admin;

use App\Models\FiatWithdrawal;
use App\Models\User;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditFiatWithdrawal extends ModalComponent
{
    public $withdrawal;
    public $amount;
    public $account_no;
    public $account_name;
    public $bank_name;
    public $routing_no;
    public $description;
    public $user_id;
    public $date;

    protected function rules(){
        return [
            'amount'=>['required','numeric','integer'],
            'account_no'=>['required','numeric','min:8'],
            'account_name'=>['required','string'],
            'bank_name'=>['required','string',],
            'routing_no'=>['required','integer','numeric'],
            'description'=>[Rule::excludeIf(!$this->description),'string'],
            'date' => 'required|date',
        ];
    }

    protected $validationAttributes=[
        'account_no'=>'account number',
        'account_name'=>'account name',
        'bank_name'=>'bank name',
        'routing_no'=>'routing number',
    ];

    public function mount($id){
        $this->withdrawal = FiatWithdrawal::find($id);
        $this->amount = $this->withdrawal->amount;
        $this->account_name = $this->withdrawal->account_name;
        $this->account_no = $this->withdrawal->account_no;
        $this->bank_name = $this->withdrawal->bank_name;
        $this->routing_no = $this->withdrawal->routing_no;
        $this->description = $this->withdrawal->description;
        $this->user_id  = $this->withdrawal->user_id;
        $this->date = $this->withdrawal->created_at;
    }

    public function submit(){
        $this->validate();
        if($this->amount>$this->withdrawal->user->acROI){
            session()->flash('result','amount exceeded Net income');
        }else{
            $withdrawal = FiatWithdrawal::find($this->withdrawal->id);           
            $withdrawal->account_name = $this->account_name;
            $withdrawal->account_no = $this->account_no;
            $withdrawal->bank_name = $this->bank_name;
            $withdrawal->routing_no = $this->routing_no;
            $withdrawal->description = $this->description;
            $withdrawal->created_at = $this->date;
            if($this->withdrawal->amount!==$this->amount){
                $withdrawal->amount = $this->amount;
                $old_amount = $this->withdrawal->amount;
                $user = User::find($this->user_id);
                $user->acROI = ($user->acROI + $old_amount) - $this->amount;
                $user->update();
            }else{
                $withdrawal->amount = $this->amount;
            }
            $withdrawal->update();

            $this->closeModalWithEvents(['editedFiatWithdrawal']);
        }
    }

    public function render()
    {
        return view('livewire.admin.edit-fiat-withdrawal');
    }
}
