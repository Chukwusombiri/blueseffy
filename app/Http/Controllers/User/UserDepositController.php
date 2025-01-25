<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;


class UserDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);            
        return view('user.deposit')->with([
            'user'=>$user,          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                     
        $user = User::find(auth()->user()->id);
        $wallets = Wallet::select('id','name')->get();
        return view('user.make_deposit')->with([            
            'user'=>$user,
            'wallets'=>$wallets,
        ]);

    }
}