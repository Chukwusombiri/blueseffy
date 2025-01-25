<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $withdrawals = $user->withdrawals()->orderByDesc('withdrawals.id')->get();
       
        return view('user.withdrawal')->with([
            'user'=>$user,
            'withdrawals'=>$withdrawals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::find(auth()->user()->id);        
        $userwallets = $user->userwallets()->select('user_wallets.id','user_wallets.name','address')->get();
        $acROI = $user->acROI;
        $acBal= $user->acBal;
       
            return view('user.make_withdrawal')->with([
                'user'=>$user,                
                'userwallets'=>$userwallets,
                'acROI'=>$acROI,
                'acBal'=>$acBal
            ]);
    }
}
