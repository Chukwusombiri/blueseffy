<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserPromo extends Component
{
    use WithPagination;
    public User $user;
    protected $listeners = ['addedPromo'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.manage-user-promo',[
            'promos'=>Promo::where('user_id',$this->user->id)->orderByDesc('created_at')->paginate(5),
        ]);
    }
}
