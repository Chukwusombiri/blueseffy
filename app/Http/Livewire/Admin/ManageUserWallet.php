<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserWallet;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserWallet extends Component
{
    use WithPagination;
    public User $user;

    protected $listeners =['addedUserWallet'=>'$refresh','editedUserWallet'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function deleteWallet($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('guestHome');
        }

       $wallet = UserWallet::find($id);      
       $wallet->delete();     
       $this->emit('deletedUserWallet');
    }

    public function render()
    {
        return view('livewire.admin.manage-user-wallet',[
            'userwallets'=>UserWallet::where('user_id',$this->user->id)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
