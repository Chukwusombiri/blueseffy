<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use Livewire\Component;

class ManageBots extends Component
{
    public $bots;

    protected $listeners = [
        'botDeleted' => '$refresh',
        'botEdited' => '$refresh',
        'botCreated' => '$refresh',
    ];
    public function mount(){
        $this->bots = Bot::all();
    }

    public function delete($id){
        if(!auth()->user()->is_admin){
            session_destroy();
            return redirect('login');
        }

        try {
            $bot = Bot::findOrFail($id);
            $bot->delete();
            $this->emit('botDeleted');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.admin.manage-bots');
    }
}
