<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;   
    public $date = 'desc';    
    public $search ='';

    protected $listeners = [
        'userUpdated'=>'$refresh',
        'addedMember'=>'$refresh',
        'bannedUser'=>'$refresh',
        'unbannedUser'=>'$refresh',
        'deletedMember'=>'$refresh',
        'madeAdmin'=>'$refresh',
        'removedAdmin'=>'$refresh',
        'resumedTrade'=>'$refresh',
        'pausedTrade'=>'$refresh',
        'verifiedUser'=>'$refresh',
    ];
    
    public function updatingSearch()
    {
        $this->resetPage();                   
    }

    public function verify($id){
        $user = User::find($id);
        if($user){
            $user->markEmailAsVerified();
            $this->emit('verifiedUser');
        }
    }

    public function clear(){
        $this->search = '';
    }
    public function render()
    {       
        return view('livewire.admin.show-users',[
            'users' => User::whereNotIn('is_admin', [1])
        ->where('name', 'like', '%'.$this->search.'%')            
        ->orWhere('email','LIKE', '%'.$this->search.'%')        
        ->orderBy('created_at',$this->date)
        ->paginate(7)
        ]);        
    }
}
