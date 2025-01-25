<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class ManagePromo extends Component
{
    use WithPagination;
    public $listener = [
        'addedFundAllPromo'=>'$refresh'
    ];

    public function delete($id){
        if(!auth()->user()->is_admin) {
            return redirect()->route('login');
        }

       $promo = Promo::find($id);      
       $promo->delete();
       $this->emit('deletedPromo');
    }
    public function render()
    {
        return view('livewire.admin.manage-promo',[
            'promos'=>Promo::orderByDesc('created_at')->paginate(5)
        ]);
    }
}
