<?php

namespace App\View\Components;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminSidebar extends Component
{
   
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {                     
        return view('components.admin-sidebar',[
            'company'=>Company::first(),
            'latestusers'=>User::where('created_at','>',Auth::user()->last_sign_out_at)->get()
        ]);
    }
}
