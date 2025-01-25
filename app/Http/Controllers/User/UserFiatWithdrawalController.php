<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserFiatWithdrawalController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        return view('user.fiat_withdrawals');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $user= User::find(auth()->user()->id);                
        $acROI = $user->acROI;
        $acBal= $user->acBal;
       
            return view('user.make_fiat_withdrawal')->with([
                'user'=>$user,                                
                'acROI'=>$acROI,
                'acBal'=>$acBal
            ]);
    }
}
