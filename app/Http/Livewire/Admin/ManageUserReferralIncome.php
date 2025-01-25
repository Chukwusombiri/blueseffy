<?php

namespace App\Http\Livewire\Admin;

use App\Models\ReferralIncome;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserReferralIncome extends Component
{
    use WithPagination;
    public User $user;

    protected $listeners=['addedRefincome'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.manage-user-referral-income',[
            'refincomes'=>ReferralIncome::where('user_id',$this->user->id)
            ->orderByDesc('created_at')
            ->paginate(5),
        ]);
    }
}
