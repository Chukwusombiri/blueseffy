<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::find(auth()->user()->id);        
        $wallets = $user->userwallets()->get();
        return view('user.wallet')->with([
            'user'=>$user,
            'wallets'=>$wallets,
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
        $validator = Validator::make($request->all(),[
            'wallet_name'=>['bail','required','string'],
            'wallet_address'=>['bail','required','string','unique:user_wallets,address']
        ]);

        $response = Array(
            'error_message'=>'none',
            'status'=>0,
            'wallet_id'=>null,   
            'result'=>'none',
            'wallet_name'=>"",
            'wallet_address'=>"",
            'wallet_added'=>"",
        );

        if($validator->fails()){
            $response['error_message'] = $validator->errors();
            return response()->json($response);
        }else{
            $wallet = new UserWallet();
            $wallet->name = $request->wallet_name;
            $wallet->address = $request->wallet_address;
            $user = User::find(auth()->user()->id);
            $wallet->user_id = $user->id;  
            $wallet->save();          
            $response['status']=1;
            $response['wallet_id']=$wallet->id;
            $response['result']=$wallet->name.' wallet was added successfully. Do you want to add more?';
            $response['wallet_name']= $wallet->name;
            $response['wallet_address']= $wallet->address;
            $response['wallet_added']= date('M d, Y', strtotime($wallet->created_at));            
            return response()->json($response);
        }
    }

    public function getWalletById($id){
        $wallet = UserWallet::find($id);
        return response()->json($wallet);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wallet = UserWallet::find($id);
        $validator = Validator::make($request->all(),[
            'wallet_name'=>['bail','required','string'],
            'wallet_address'=>['bail','required','string','unique:user_wallets,address,'.$wallet->id]
        ]);

        $response = Array(
            'error_message'=>'none',
            'status'=>0,
            'wallet_id'=>null,              
            'wallet_name'=>"",
            'wallet_address'=>"", 
            'result'=>''          
        );

        if($validator->fails()){
            $response['error_message']=$validator->errors();
            return response()->json($response);
        }else{           
            $wallet->name = $request->wallet_name;
            $wallet->address = $request->wallet_address;           
            $wallet->update();
            $response['status']=1;
            $response['result']='Wallet updated successfully';
            $response['wallet_name']= $wallet->name;
            $response['wallet_address']= $wallet->address;
            $response['wallet_id']=$wallet->id;
           
            return response()->json($response);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Array(
            'status' => 0, 
            'id'=>'',
            'result'=>'Something went wrong! Try again later.',           
        );                       
        
        if($wallet = UserWallet::find($id)){
            $response['status']=1;
            $response['id']=$wallet->id;
            $response['result']='You successfully deleted '.$wallet->name.' wallet';
            $wallet->delete();
            return response()->json($response);           
        }else{
            return response()->json($response); 
        }        
    }
}
