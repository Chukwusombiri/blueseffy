<?php

namespace App\Http\Livewire\Admin;

use App\Models\Downline;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LivewireUI\Modal\ModalComponent;

class AddUserDownline extends ModalComponent
{
    public $user;
    public $downline_id;
    
    protected $rules=[
        'downline_id'=>['required','exists:users,id'],
    ];

    protected $validationAttributes=[
        'downline_id'=>'Downline',
    ];

    public function mount($id){
        $this->user = User::find($id);
    }

    public function save(){
        $this->validate();

        $downline=new Downline();
        $downline->user_id=$this->user->id;
        $downline->downline_id=$this->downline_id;
        $downline->save();

        $this->closeModalWithEvents([
            'addedDownline'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.add-user-downline',[
            'downlines'=>User::doesntHave('upline',)
            ->where('users.id', '!=', $this->user->id)
            ->get()
        ]);
    }
}
