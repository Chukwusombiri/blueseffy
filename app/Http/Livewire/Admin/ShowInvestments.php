<?php

namespace App\Http\Livewire\Admin;

use App\Models\InvestmentDeposit;
use App\Models\Plan;
use App\Models\User;
use App\Notifications\InvestmentApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInvestments extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = [
        'editedInvestment' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->search = '';
    }

    public function approve($id)
    {
        $investment = InvestmentDeposit::find($id);
        if ($investment->is_approved = true) {
            $investment->update();
            $user = User::find($investment->user_id);
            $user->acBal =  $user->acBal + $investment->amount;
            $user->acROI = $user->acROI + $investment->amount;
            $user->totBal = $user->totBal + $investment->amount;
            if (!$investment->wallet_id) {
                $user->doBal = $user->doBal - $investment->amount;
            }
            $user->percent = 1;
            $user->status = 'earning';
            $user->update();
            $user->notify(new InvestmentApprovalNotification($investment));

            if (!empty($user->upline)) {
                $referrer = User::find($user->upline->user_id);
                $ref_bonus = Plan::select('ref_commission')->where('id', $investment->plan_id)->value('ref_commission') ?? 10;
                $ref_earn = $investment->amount * $ref_bonus / 100;
                $referrer->acROI = $referrer->acROI + $ref_earn;
                $referrer->totBal = $referrer->totBal + $ref_earn;
                $referrer->update();
                $referrer->notify(new ReferralIncomeNotification($referrer->name, $investment, $ref_earn));
            }
            $this->emit('approvedinvestment');
        }
    }

    public function delete($id)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('login');
        }

        $investment = InvestmentDeposit::find($id);
        $investment->delete();
        $this->emit('deletedinvestment');
    }

    public function render()
    {
        return view('livewire.admin.show-investments', [
            'investments' => InvestmentDeposit::whereHas('user')
                ->where(function ($query) {
                    $query->where('amount', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('plan', 'name', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('wallet', 'name', 'like', '%' . $this->search . '%');
                })
                ->orderByDesc('created_at')
                ->paginate(5),
        ]);
    }
}
