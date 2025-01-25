<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class Progress extends Component
{
    public $percent=0;
    
    public function render()
    {
        $counter = auth()->user()->counter;
        $acBal = auth()->user()->acBal;
        $plan = Plan::where('min','<=',$acBal)->where('max','>=',$acBal)->first();
        $this->percent = ($counter/$plan->duration) * 100;       
        return view('livewire.progress');
    }
}
