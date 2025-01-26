<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;

class RemoveImage extends ModalComponent
{
    public $user;

    public function mount($id){
        $this->user = User::find($id);
    }

    public function remove(){       
        $user = User::find($this->user->id);
        if($user->profile_photo_path!=='profile-photos/user.png'){
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = 'profile-photos/user.png';  
            $user->save();      
            $this->closeModalWithEvents(['removedImage']);
        }      
    }

    public function render()
    {
        return view('livewire.admin.remove-image');
    }
}
