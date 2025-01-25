<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\NewWalletNotification;
use App\Notifications\WalletUpdateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyWalletController extends Controller
{
    public function index(){             
        $wallets = Wallet::all();
        return view('admin.companywallets')->with(['wallets'=>$wallets,          
        ]);
    }

    public function create(){                    
        return view('admin.addcompanywallet');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>['required','string'],
            'address'=>['required','string','unique:wallets,address'], 
             'icon'=>'required|image|max:2000'          
        ]);

        $wallet = new Wallet();
        $wallet->name = $request->name;
        $wallet->address = $request->address;   
        $wallet->icon_path = $request->icon->storePublicly('wallets','public');      
        $wallet->save();
        $user = User::find(auth()->user()->id);
        $user->notify(new NewWalletNotification($wallet));

        return redirect()->back()->with('success', 'Company wallet successfully added');
    }

    public function edit($id){
        $wallet =  Wallet::find($id);              
        return view('admin.editcompanywallet')->with([
            'wallet'=>$wallet,
        ]);
    }

    public function update(Request $request,$id){
        $wallet = Wallet::find($id);

        $this->validate($request,[
            'name'=>['required','string'],
            'address'=>['required','string','unique:user_wallets,address,'.$wallet->id],   
            'icon'=>'image|max:2000'
        ]);
        $wallet->name = $request->name;
        $wallet->address = $request->address;   
        if($request->hasFile('icon')){
            Storage::disk('public')->delete($wallet->icon_path);  
            $wallet->icon_path = $request->icon->storePublicly('wallets','public');               
        }     
        $wallet->update();
        $user = User::find(auth()->user()->id);
        $user->notify(new WalletUpdateNotification($wallet));
        return redirect()->back()->with('success', $wallet->name.' wallet successfully updated');
    }

    public function destroy($id){
        $wallet = Wallet::find($id);
        $old = $wallet->name;
        Storage::disk('public')->delete($wallet->icon_path);
        $wallet->delete();
        return redirect()->back()->with('success', $old.' wallet successfully Deleted');
    }
}
