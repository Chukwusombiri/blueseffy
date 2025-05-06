<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use App\Models\User;
use App\Notifications\PromoNotification;
use Illuminate\Http\Request;

class PromoController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.promo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                    
        $users = User::all(); 
        return view('admin.addpromo')->with([
        'users' => $users
        ]);                
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
            'amount' => ['required', 'numeric'],            
            'user_id' => ['required','exists:App\Models\User,id'],
            'name'=>['required','string'],
            'promo_message'=>['required','string'],
        ]);               
            $promo = new Promo();
            $promo->amount = $request->amount;
            $promo->name = $request->name;
            $promo->user_id = $request->user_id;                         
            $promo->save();   
            $promo_message = $request->promo_message;
            $user=User::find($request->user_id);
            $user->acROI += $request->amount;
            $user->update();
            $user->notify(new PromoNotification($promo,$promo_message));         
            return redirect()->route('admin.promos')->with('success','Promo funded successfully');
    }
}
