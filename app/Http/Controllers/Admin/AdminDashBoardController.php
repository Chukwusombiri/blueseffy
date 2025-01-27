<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Downline, FiatWithdrawal, FundingDeposit, InvestmentDeposit, Promo, ReferralIncome, User, Withdrawal};
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminDashBoardController extends Controller
{   
   
    public function index(){
        $users = User::whereNotIn('is_admin', [1])
        ->count();
    
        $newusers = User::where('created_at','>',Auth::user()->last_sign_out_at)
        ->where('id','!=',Auth::user()->id)
        ->orderBy('created_at','desc')
        ->get();
                
        $admin = User::find(auth()->user()->id);
        
        $deposits = FundingDeposit::where('is_approved',1)->get();
        $investments = InvestmentDeposit::where('is_approved',1)->get();
        $totbal = User::where('id','!=',auth()->user()->id)->sum('totBal'); 
        $dobal = User::where('id','!=',auth()->user()->id)->sum('doBal');             
        $acbal = User::where('id','!=',auth()->user()->id)->sum('acBal');       
        $acROI  = User::where('id','!=',auth()->user()->id)->sum('acROI');
        $totdepcount = FundingDeposit::where('user_id','!=',auth()->user()->id)->count();        
        $totinvestmentcount = InvestmentDeposit::where('user_id','!=',auth()->user()->id)->count();        
        $totwitcount = Withdrawal::where('user_id','!=',auth()->user()->id)->count();
        $totfiatwitcount = FiatWithdrawal::where('user_id','!=',auth()->user()->id)->count();  
        $totpromocount = Promo::where('user_id','!=',auth()->user()->id)->count();        
        $totrefcount = Downline::all()->count();      
        $deposited_count = FundingDeposit::where('is_approved',1)->count();
        $deposited_value = FundingDeposit::where('is_approved',1)->sum('amount');
        $invested_count = InvestmentDeposit::where('is_approved',1)->count();
        $invested_value = InvestmentDeposit::where('is_approved',1)->sum('amount');
        $withdrawn_count  = Withdrawal::where('is_approved',1)->where('is_verified',[1])->count();
        $withdrawn_value = Withdrawal::where('is_approved',1)->where('is_verified',[1])->sum('amount');                
        $newinvestments = InvestmentDeposit::where('created_at','>',auth()->user()->last_sign_out_at)->get();
        $wits = Withdrawal::where('created_at','>',auth()->user()->last_sign_out_at)->where('is_verified',[1])->get();  
        $fiat_wits = FiatWithdrawal::where('created_at','>',auth()->user()->last_sign_out_at)->where('is_verified',[1])->get();  
        $newwithdrawals = collect();     
        $newwithdrawals = $newwithdrawals->merge($wits)->merge($fiat_wits)
        ->sortByDesc('created_at')->values()->take(7);

        return view('admin.dashboard')->with(['users'=>$users,'acbal'=>$acbal,'acROI'=>$acROI,'dobal'=>$dobal,
        'totbal'=>$totbal,'totinvestmentcount'=>$totinvestmentcount,'investments'=>$investments,'invested_count'=>$invested_count,
        'totdepcount'=>$totdepcount, 'totwitcount'=>$totwitcount,'totrefcount' => $totrefcount,'invested_value'=>$invested_value,
        'totpromocount'=>$totpromocount,'newusers' => $newusers,'deposited_count'=>$deposited_count,'newinvestments'=>$newinvestments,
        'deposited_value'=>$deposited_value,'withdrawn_count'=>$withdrawn_count,'withdrawn_value'=>$withdrawn_value,
        'admin'=>$admin,'newwithdrawals'=>$newwithdrawals,'totfiatwitcount'=>$totfiatwitcount,
        ]);
    }

    public function resetpwd(){             
        return view('admin.resetpwd');
    }

    public function reset(Request $request){        
        request()->validate([
            'current_password' => ['required'],
            'new_password' => ['required','confirmed', Rules\Password::defaults()]
        ]);
 
        if (!Hash::check($request->current_password, $request->user()->password)) {
             return back()->with([
                 'error' => 'The provided password does not match our records.',
             ]);
         }
 
         User::whereId(auth()->user()->id)->update([
             'password' => Hash::make($request->new_password)
         ]);

        return redirect()->route('admin.resetpwd')->with(['success'=>'password changed successfully']);
    }

    public function readNotifications($id){
        $admin = User::find(auth()->user()->id);
       if($id == 'all'){
        $notifications = $admin->unreadNotifications;  
        $notifications->markAsRead();        
       }else{
        $notification = $admin->unreadNotifications()->where('notifications.id',$id)->first();  
        $notification->markAsRead();                    
       }

       return redirect()->back();
    }

    public function referralIncome(){       
        $referralIncomes = ReferralIncome::all();        
        return view('admin.referralIncomes')->with([            
            'referralIncomes'=>$referralIncomes,
            
        ]);
    }

    public function seereferrals($id){               
        $user = User::find($id);        
        $referrals =  User::whereRelation('upline', 'user_id', $id)->get();                                     
            return view('admin.seerefs')->with([                
                'referrals'=>$referrals,
                'user'=>$user,
                
            ]);
        
    } 
        
}
