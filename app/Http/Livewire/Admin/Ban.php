<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Ban extends ModalComponent
{ 
    public $user;

    public function mount($id){
        $this->user = User::find($id);
    }
    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }

    public function banUser(){
        $user = User::find($this->user->id);
        $user->is_banned = true;
        $user->save();

        $this->closeModalWithEvents(['bannedUser']);
    }
    public function render()
    {
        return view('livewire.admin.ban');
    }
}
