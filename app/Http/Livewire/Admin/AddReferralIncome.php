<?php

namespace App\Http\Livewire\Admin;

use App\Models\ReferralIncome;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LivewireUI\Modal\ModalComponent;

class AddReferralIncome extends ModalComponent
{
    public $user;
    public $amount;
    public $downline_id;

    protected $rules=[
        'amount'=>'required|numeric|integer',
        'downline_id'=>'required|exists:users,id'
    ];

    protected $validationAttributes=[
        'downline_id'=>'Downline'
    ];

    public function mount($id){
        $this->user = User::find($id);
    }

    public function submit(){
        $this->validate();

        $refincome = new ReferralIncome();
        $refincome->user_id = $this->user->id;
        $refincome->amount = $this->amount;
        $refincome->downline_id= $this->downline_id;

        $refincome->save();

        $this->closeModalWithEvents([
            'addedRefincome'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.add-referral-income',[
            'downlines'=>User::whereHas('upline',function(Builder $query){
                $query->where('user_id',$this->user->id);
            })->get()
        ]);
    }
}
