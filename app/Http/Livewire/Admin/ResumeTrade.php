<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class ResumeTrade extends ModalComponent
{
    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }
    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }


    public function resumeTrade(){
        $user = User::find($this->user->id);
        $user->is_paused = false;
        $user->save();

        $this->closeModalWithEvents(['resumedTrade']);
    }
    public function render()
    {
        return view('livewire.admin.resume-trade');
    }
}
