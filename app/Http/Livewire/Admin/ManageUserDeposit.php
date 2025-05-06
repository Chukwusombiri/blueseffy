<?php

namespace App\Http\Livewire\Admin;

use App\Models\FundingDeposit;
use App\Models\User;
use App\Notifications\DepositApprovalNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserDeposit extends Component
{
    Use WithPagination;

    public User $user;

    protected $listeners=[
    'addedDeposit'=>'$refresh',
    'editedDeposit'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function approve($id){
        $deposit=FundingDeposit::find($id);
        if($deposit->is_approved = true){
            $deposit->update();
            $user = User::find($deposit->user_id);
            $user->doBal =  $user->doBal + $deposit->amount;                       
            $user->update();
            $user->notify(new DepositApprovalNotification($deposit));                    
        }
    }

    public function delete($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('login');
        }

       $deposit = FundingDeposit::find($id);
       $user = User::find($deposit->user_id);
       $user->doBal = $user->doBal - $deposit->amount;
       $user->update();
       $deposit->delete();
       $this->emit('deletedDeposit');      
    }

    public function render()
    {
        return view('livewire.admin.manage-user-deposit',[
            'deposits' => FundingDeposit::where('user_id',$this->user->id)
            ->orderByDesc('created_at')->paginate(5)
        ]);
    }
}
