<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class UserInvestmentController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);            
        return view('user.investments')->with([
            'user'=>$user,          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {     
        $plan = Plan::find($id);
        if($plan!=null){
            $user = User::find(auth()->user()->id);
            $wallets = Wallet::select('id','name')->get();
            return view('user.make_investment')->with([
                'plan'=>$plan,
                'user'=>$user,
                'wallets'=>$wallets,
            ]);
        }else{
            return redirect()->back();
        }
        
    }
}
