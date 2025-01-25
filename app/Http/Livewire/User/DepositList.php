<?php

namespace App\Http\Livewire\User;

use App\Models\FundingDeposit;
use Livewire\Component;
use Livewire\WithPagination;

class DepositList extends Component
{    
    use WithPagination;

    protected $listeners = [
        'uploadedReceipt'=>'$refresh'
    ];

    public function render()
    {
        return view('livewire.user.deposit-list',[
            'deposits'=>FundingDeposit::where('user_id',auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
