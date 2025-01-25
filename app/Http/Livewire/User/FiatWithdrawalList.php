<?php

namespace App\Http\Livewire\User;

use App\Models\FiatWithdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class FiatWithdrawalList extends Component
{
    use  WithPagination;
    public function render()
    {
        return view('livewire.user.fiat-withdrawal-list',[
            'withdrawals'=>FiatWithdrawal::where('user_id',auth()->user()->id)
            ->where('is_verified',[1])
            ->orderByDesc('created_at')
            ->paginate(5),]);
    }
}
