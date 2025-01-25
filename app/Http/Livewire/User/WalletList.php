<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserWallet;
use Livewire\Component;
use Livewire\WithPagination;

class WalletList extends Component
{
    use WithPagination;
    protected $listeners = [
        'addedUserWallet'=>'$refresh',
        'editedUserWallet'=>'$refresh'
    ];  

    public function deleteWallet($id){       
       $wallet = UserWallet::find($id);      
       $wallet->delete();     
       $this->emit('deletedUserWallet');
    }
    public function render()
    {
        return view('livewire.user.wallet-list',[
            'wallets'=>UserWallet::where('user_id',auth()->user()->id)
            ->paginate(5),
            'user'=>User::find(auth()->user()->id),
        ]);
    }
}
