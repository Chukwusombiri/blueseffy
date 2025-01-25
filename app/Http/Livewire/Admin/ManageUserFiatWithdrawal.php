<?php

namespace App\Http\Livewire\Admin;

use App\Models\FiatWithdrawal;
use App\Models\User;
use App\Notifications\FiatWithdrawalApprovalNotification;

use Livewire\Component;
use Livewire\WithPagination;

class ManageUserFiatWithdrawal extends Component
{
    use WithPagination;
    public User $user;
    protected $listeners = [
        'addedUserFiatWithdrawal'=>'$refresh',
        'editedFiatWithdrawal'=>'$refresh'
    ];
    
    public function mount(User $user){
        $this->user = $user;
    }

    public function appprove($id){
        $withdrawal = FiatWithdrawal::find($id);
        if($withdrawal->is_approved = true){
            $withdrawal->user->notify(new FiatWithdrawalApprovalNotification($withdrawal));
            if($withdrawal->update()){                
                $withdrawal->user->acROI =  $withdrawal->user->acROI - $withdrawal->amount;
                $withdrawal->user->update();                
            }        
        }
    }

    public function delete($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('guestHome');
        }

       $withdrawal = FiatWithdrawal::find($id);      
       $withdrawal->delete();     
       $this->emit('deletedFiatWithdrawal');
    }
    public function render()
    {
        return view('livewire.admin.manage-user-fiat-withdrawal',[
            'withdrawals'=>FiatWithdrawal::where('user_id',$this->user->id)
            ->where('is_verified',1)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
