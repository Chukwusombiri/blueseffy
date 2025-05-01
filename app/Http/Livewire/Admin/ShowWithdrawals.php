<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use Livewire\Component;
use Livewire\WithPagination;

class ShowWithdrawals extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = [
        'editedWithdrawal' => '$refresh',
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
        $withdrawal = Withdrawal::find($id);
        if ($withdrawal->is_approved = true) {
            $withdrawal->update();
            $user = User::find($withdrawal->user_id);
            $user->acROI =  $user->acROI - $withdrawal->amount;
            $user->update();
            //$user->notify(new WithdrawalApprovalNotification($withdrawal));
            $this->emit('approvedWithdrawal');
        } else {
            session()->flash('error', 'withdrawal approval failed.');
        }
    }

    public function delete($id)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('guestHome');
        }

        $withdrawal = Withdrawal::find($id);
        $withdrawal->delete();
        $this->emit('deletedWithdrawal');
    }

    public function render()
    {
        return view('livewire.admin.show-withdrawals', [
            'withdrawals' =>  Withdrawal::whereHas('user')
                ->where(function ($query) {
                    $query->where('amount', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $this->search . '%')
                        ->orWhereRelation('userWallet', 'name', 'like', '%' . $this->search . '%');
                })
                ->orderByDesc('created_at')
                ->paginate(5),
        ]);
    }
}
