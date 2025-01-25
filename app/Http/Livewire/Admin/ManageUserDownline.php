<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ManageUserDownline extends Component
{
    public User $user;

    protected $listeners = [
        'addedDownline'=>'$refresh'
    ];
    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.manage-user-downline',[
            'downlines'=>User::whereHas('upline', function (Builder $query) {
                $query->where('user_id', '=', $this->user->id);
            })->get()
        ]);
    }
}
