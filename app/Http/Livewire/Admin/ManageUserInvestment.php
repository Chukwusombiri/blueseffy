<?php

namespace App\Http\Livewire\Admin;

use App\Models\InvestmentDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Notifications\InvestmentApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserInvestment extends Component
{
    Use WithPagination;

    public User $user;

    protected $listeners=[
    'addedInvestment'=>'$refresh',
    'editedInvestment'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function approve($id){
        $investment=InvestmentDeposit::find($id);
        if($investment->is_approved = true){
            $investment->update();
            $user = User::find($investment->user_id);
            $user->acBal =  $user->acBal + $investment->amount;
            $user->acROI = $user->acROI + $investment->amount;
            $user->totBal = $user->totBal + $investment->amount;
            if(!$investment->wallet_id){
                $user->doBal = $user->doBal - $investment->amount;
            }
            $user->status = 'earning';
            $user->percent = 1;
            $user->update();
            //$user->notify(new InvestmentApprovalNotification($investment));
            
            if(!empty($user->upline)){
                $referrer = User::find($user->upline->user_id);
                $ref_bonus = Plan::select('ref_commission')->where('id',$investment->plan_id)->value('ref_commission');
                $ref_earn = $investment->amount * $ref_bonus/100;
                $referrer->acROI =$referrer->acROI + $ref_earn;
                $referrer->update();
                //$referrer->notify(new ReferralIncomeNotification($referrer->name,$investment,$ref_earn));
            }   
            
            $this->emit('approvedInvestment'); 
        }
    }

    public function delete($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('login');
        }

       $deposit = InvestmentDeposit::find($id);      
       $deposit->delete();
       $this->emit('deletedInvestment');      
    }

    public function render()
    {
        return view('livewire.admin.manage-user-investment',[
            'investments' => InvestmentDeposit::where('user_id',$this->user->id)
            ->orderByDesc('created_at')->paginate(5)
        ]);
    }
}
