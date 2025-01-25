<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;

class DeleteMember extends ModalComponent
{
    public User $user;
    
    public function mount(User $user){
        $this->user = $user;
    }

    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }


    public function deleteMember(){
        $user = User::find($this->user->id);
        if(!auth()->user()->is_admin){
            return redirect()->route('guesthome');
        }
        if($user->profile_photo_path != 'profile-photos/userimg.jpg'){
            Storage::delete('/public/profile-photos/'.$user->profile_photo_path);  
        }
        $user->delete();

        $this->closeModalWithEvents(['deletedMember']);
    }

    public function render()
    {
        return view('livewire.admin.delete-member');
    }
}
