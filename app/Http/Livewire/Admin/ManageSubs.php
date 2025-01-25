<?php

namespace App\Http\Livewire\Admin;

use App\Models\BotUser;
use Livewire\Component;
use Livewire\WithPagination;

class ManageSubs extends Component
{
    use WithPagination;    
    public $search ='';  

    protected $listeners = [
        'editedSubscription'=>'$refresh',
        'deletedSubscription'=>'$refresh',
        'approvedSubscription'=> '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();            
    }

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function approve($id){        
        try {
            $sub=BotUser::findOrFail($id);
            $sub->status = 'active';
            $sub->save();
            $this->emit('approvedSubscription');
        } catch (\Throwable $th) {
            session()->flash('error','Oops! Something went wrong, refresh page.');
            return;
        }        
    }

    public function delete($id){
        try {
            if(!auth()->user()->is_admin) {
                return redirect()->route('login');
            }
    
           $sub = BotUser::findOrFail($id);       
           $sub->delete();
           $this->emit('deletedSubscription');
        } catch (\Throwable $th) {
            session()->flash('error','Oops! Something went wrong, refresh page.');
            return;
        }        
    }


    public function render()
    {
        $subscriptions = BotUser::where('bot', 'like', '%'.$this->search.'%')
            ->orWhere('wallet', 'like', '%'.$this->search.'%')
            ->orWhereHas('user', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->orderByDesc('created_at')
            ->paginate(8);
        return view('livewire.admin.manage-subs',[
            'subscriptions' => $subscriptions,
        ]);
    }
}
