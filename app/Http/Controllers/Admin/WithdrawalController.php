<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{

    
    private $withdrawals;

    public function __construct()
    {
        $this->withdrawals = Withdrawal::orderBy('id','desc')->where('is_verified',[1])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        return view('admin.withdrawals');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        $users =User::where('id','!=',auth()->user()->id)->get();          
        return view('admin.addwithdrawal')->with([
            'users' => $users,           
        ]);
    }

    public function getUserWallets($id){
        $empData['data'] = UserWallet::select('id','name')
        ->where('user_id',$id)
        ->get();

     return response()->json($empData);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => ['required', 'integer','numeric'],
            'wallet_id' => ['required','exists:user_wallets,id'],           
            'user_id' => ['required','exists:App\Models\User,id'],
        ]);
        
        $acROI = User::select('acROI')->where('id',$request->user_id)->value('acROI');       

        if($request->amount > $acROI){
            return redirect()->back()->with('error','Amount exceeded available funds! Try again with lower amount.');
        }

        $withdrawal = new Withdrawal();        
        $withdrawal->amount = $request->amount;
        $withdrawal->user_id = $request->user_id;
        $withdrawal->user_wallet_id = $request->wallet_id;        
        $withdrawal->is_approved = true;
        $withdrawal->is_verified = true;

        if($withdrawal->save()){
            $user = User::find($request->user_id);
            $user->acROI =  $user->acROI - $request->amount;
            $user->update();            
            $user->notify(new WithdrawalApprovalNotification($withdrawal));
            return redirect()->route('admin.withdrawals')->with('success','withdrawal created successfully');             
        }          
                          
    }   
}
