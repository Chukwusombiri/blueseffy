<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class PauseTrade extends ModalComponent
{
    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }
    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }


    public function pauseTrade(){
        $user = User::find($this->user->id);
        $user->is_paused = true;
        $user->save();

        $this->closeModalWithEvents(['pausedTrade']);
    }
    public function render()
    {
        return view('livewire.admin.pause-trade');
    }
}
