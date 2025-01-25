<?php

namespace App\Http\Livewire\Admin;

use App\Models\BotUser;
use App\Models\User;
use Livewire\Component;

class ManageUserSubs extends Component
{    
    public $user;

    protected $listeners = [
        'subApproved' => '$refresh',
        'editedSubscription' => '$refresh',
        'addedUserSub' => '$refresh',
    ];

    public function mount(User $user){
        $this->user = $user;
    }
   
    public function approve($id){
        try {
            $sub = BotUser::findOrFail($id);
            $sub->status = 'active';
            $sub->save();
            $this->emit('subApproved');
        } catch (\Throwable $th) {
            session()->flash('error','Oops! Something went wrong, try again.');
            return;
        }
    }

    public function delete($id){
        if(!auth()->user()->is_admin){
            session_destroy();
            return redirect()->route('login');
        }
        try{
            $sub = BotUser::findOrFail($id);
            $sub->delete();
            $this->emit('subDeleted');
        }catch(\Throwable $th){
            session()->flash('error','Oops! Something went wrong, try again.');
            return;
        }
    }
    public function render()
    {
        $subscriptions = BotUser::where('user_id',$this->user->id)->paginate(8);
        return view('livewire.admin.manage-user-subs',[
            'subscriptions'=>$subscriptions,
        ]);
    }
}
