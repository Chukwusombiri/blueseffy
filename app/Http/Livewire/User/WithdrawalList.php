<?php

namespace App\Http\Livewire\User;

use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class WithdrawalList extends Component
{
    use  WithPagination;
    public function render()
    {
        return view('livewire.user.withdrawal-list',[
            'withdrawals'=>Withdrawal::where('user_id',auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
