<?php

namespace App\Http\Livewire\Admin;

use App\Models\FundingDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Notifications\DepositApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDeposits extends Component
{
    use WithPagination;    
    public $search ='';  

    protected $listeners = [
        'editedDeposit'=>'$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();         
    }

    public function clear(){
        $this->search = '';
    }

    public function approve($id){
        $deposit=FundingDeposit::find($id);
        if($deposit->is_approved = true){
            $deposit->update();
            $user = User::find($deposit->user_id);            
            $user->doBal = $user->doBal + $deposit->amount;
            $user->totBal = $user->acROI + $deposit->amount;
            $user->update();
            $user->notify(new DepositApprovalNotification($deposit));
                       
            $this->emit('approvedDeposit');
        }
    }

    public function delete($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('login');
        }

       $deposit = FundingDeposit::find($id);
       $user = User::find($deposit->user_id);
       $user->doBal = $user->acBal - $deposit->amount;
       $user->update();
       $deposit->delete();
       $this->emit('deletedDeposit');
    }

    public function render()
    {
        return view('livewire.admin.show-deposits',[
           'deposits'=> FundingDeposit::where('user_id','!=',auth()->user()->id)
        ->where('amount', 'like', '%'.$this->search.'%')
        ->orWhereRelation('user', 'name', 'like', '%'.$this->search.'%')        
        ->orWhereRelation('wallet', 'name', 'like', '%'.$this->search.'%')
        ->orderByDesc('created_at')
        ->paginate(5),
        ]);
    }
}
