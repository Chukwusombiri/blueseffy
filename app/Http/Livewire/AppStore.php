<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class AppStore extends ModalComponent
{
    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }   
    public function render()
    {        
        return view('livewire.app-store');
    }
}
