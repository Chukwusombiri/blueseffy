<?php

namespace App\Http\Livewire\Admin;

use App\Models\Withdrawal;
use App\Models\User;
use App\Notifications\WithdrawalApprovalNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserWithdrawal extends Component
{
    use WithPagination;

    public User $user;

    protected $listeners = ['addedUserWithdrawal'=>'$refresh',
    'editedWithdrawal'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function approve($id){
        $withdrawal = Withdrawal::find($id);
        if($withdrawal->is_approved = true){
            //$withdrawal->user->notify(new WithdrawalApprovalNotification($withdrawal));
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

       $withdrawal = Withdrawal::find($id);      
       $withdrawal->delete();     
       $this->emit('deletedWithdrawal');
    }

    public function render()
    {
        return view('livewire.admin.manage-user-withdrawal',[
            'withdrawals'=>Withdrawal::where('withdrawals.user_id',$this->user->id)
            ->where('is_verified',1)->orderByDesc('created_at')->paginate(5)
        ]);
    }
}
