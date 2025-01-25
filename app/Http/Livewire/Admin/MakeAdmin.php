<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class MakeAdmin extends ModalComponent
{
    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function makeAdmin(){
        if(!auth()->user()->is_admin){
            return redirect()->route('guestHome');
        }

        $user = User::find($this->user->id);
        $user->is_Admin = true;
        $user->save();

        $this->closeModalWithEvents(['madeAdmin']);
    }
    public function render()
    {
        return view('livewire.admin.make-admin');
    }
}
