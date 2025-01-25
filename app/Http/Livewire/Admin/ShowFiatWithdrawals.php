<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\FiatWithdrawal;
use App\Notifications\FiatWithdrawalApprovalNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ShowFiatWithdrawals extends Component
{
    use WithPagination;    
    public $search ='';
       
    protected $listeners = [
        'editedFiatWithdrawal'=>'$refresh',
        'addedFiatWithdrawal'=>'$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();        
    }

    public function clear(){
        $this->search = '';
    }

    public function approve($id){
        $withdrawal=FiatWithdrawal::find($id);
        if($withdrawal->is_approved = true){
            $withdrawal->update();
            $user = User::find($withdrawal->user_id);
            $user->acROI =  $user->acROI - $withdrawal->amount;
            $user->update();                
            $user->notify(new FiatWithdrawalApprovalNotification($withdrawal));                      
            $this->emit('approvedFiatWithdrawal');
        }else{
            session()->flash('error', 'withdrawal approval failed.');
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
        return view('livewire.admin.show-fiat-withdrawals',[
           'withdrawals' =>  FiatWithdrawal::where('user_id','!=',auth()->user()->id)
            ->where('amount', 'like', '%'.$this->search.'%')           
            ->orWhere('account_no','like', '%'.$this->search.'%')
            ->orWhere('account_name','like', '%'.$this->search.'%')
            ->orWhere('bank_name','like', '%'.$this->search.'%')
            ->orWhere('routing_no','like', '%'.$this->search.'%')
            ->orWhereRelation('user','name','like', '%'.$this->search.'%')
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
