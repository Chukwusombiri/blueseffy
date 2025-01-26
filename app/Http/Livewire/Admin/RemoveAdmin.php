<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class RemoveAdmin extends ModalComponent
{
    public $user;

    public function mount($id){
        $this->user = User::find($id);
    }

    public function removeAdmin(){
        if(!auth()->user()->is_admin){
            return redirect()->route('guestHome');
        }

        $user = User::find($this->user->id);
        $user->is_Admin = false;
        $user->save();

        $this->closeModalWithEvents(['removedAdmin']);
    }
    public function render()
    {
        return view('livewire.admin.remove-admin');
    }
}
