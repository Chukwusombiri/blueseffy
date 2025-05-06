<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use App\Models\User;
use App\Notifications\PromoNotification;
use LivewireUI\Modal\ModalComponent;

class AddUserPromo extends ModalComponent
{
    public $user;
    public $amount;
    public $name;
    public $message;
    
    protected $rules=[
        'name'=>'required|string',
        'amount'=>'required|string',
        'message'=>'required|string',
    ];
    
    public function mount($id){
        $this->user = User::find($id);
    }

    public function submit(){
        $this->validate();

        $promo = new Promo();
        $promo->amount = $this->amount;
        $promo->name = $this->name;
        $promo->user_id = $this->user->id;                         
        $promo->save();   
        $promo_message = $this->message;
        $user=User::find($this->user->id);
        $user->acROI += $this->amount;
        $user->update();
        $user->notify(new PromoNotification($promo,$promo_message));   
        
        $this->closeModalWithEvents(['addedPromo']);
    }
    public function render()
    {
        return view('livewire.admin.add-user-promo');
    }
}
