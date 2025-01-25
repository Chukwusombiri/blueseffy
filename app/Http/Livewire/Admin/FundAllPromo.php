<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use App\Models\User;
use App\Notifications\PromoNotification;
use LivewireUI\Modal\ModalComponent;

class FundAllPromo extends ModalComponent
{
    public $amount;
    public $name;
    public $promo_message;

    protected function rules(){
        return [
            'amount'=>['required','numeric','integer'],
            'name'=>['required','string'],
            'promo_message'=>['required','string'],
        ];
    }

    protected $validationAttributes=[
        'promo_message'=>'promo description',
        'name'=>'promo name',
    ];

    public function submit(){
        $this->validate();

        if($users = User::all()){                                
            foreach ($users as $user) {
                $promo = new Promo();
                $promo->name = $this->name;
                $promo->amount = $this->amount;
                $promo->user_id = $user->id;                                   
                $promo->save();                                      
                $user->acROI += $this->amount;
                $user->update();
                $user->notify(new PromoNotification($promo,$this->promo_message));
             }

             $this->closeModalWithEvents(['addedFundAllPromo']);
        }else{
            session()->flash('result','unable to complete operation! Try again.');
        }      
    }

    public function render()
    {
        return view('livewire.admin.fund-all-promo');
    }
}
