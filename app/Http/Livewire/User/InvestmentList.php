<?php

namespace App\Http\Livewire\User;

use App\Models\InvestmentDeposit;
use Livewire\Component;
use Livewire\WithPagination;

class InvestmentList extends Component
{
    use WithPagination;

    protected $listeners = [
        'uploadedReceipt'=>'$refresh'
    ];

    public function render()
    {
        return view('livewire.user.investment-list',[
            'investments'=>InvestmentDeposit::where('user_id',auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
