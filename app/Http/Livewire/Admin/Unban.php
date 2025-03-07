<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Unban extends ModalComponent
{
    public $user;

    public function mount($id){
        $this->user = User::find($id);
    }
    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }


    public function unbanUser(){
        $user = User::find($this->user->id);
        $user->is_banned = false;
        $user->save();

        $this->closeModalWithEvents(['unbannedUser']);
    }
    public function render()
    {
        return view('livewire.admin.unban');
    }
}
