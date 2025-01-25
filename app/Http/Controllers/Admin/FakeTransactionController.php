<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FakeTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FakeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $faketrans = FakeTransaction::orderBy('id','desc')->get();
        return view('admin.faketrans')->with(['faketrans'=>$faketrans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('admin.addfaketran');
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
            'name' => ['required','string'],
            'amount' => ['required','numeric','integer'],
            'currency' => ['required','string'],
            'transaction' => ['required','string',Rule::in(['deposit', 'withdrawal'])],  
            'img' => ['required','image','max:2000',],                          
        ]);
       
        $faketran =  new FakeTransaction();
        $faketran->name= $request->name;
        $faketran->amount= $request->amount;
        $faketran->currency= $request->currency;
        $faketran->transaction= $request->transaction;
        if ($request->hasFile('img')) {
            $faketran->photo_path = $request->img->storePublicly('transactions','public');
        }
        $faketran->save();

        return redirect()->route('admin.faketransaction.index')->with('success','Fake transaction created successfully');
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $faketran = FakeTransaction::find($id);

       return view('admin.editfaketran')->with([
           'faketran' => $faketran,
       ]);
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
        $this->validate($request,[
            'name' => ['required','string'],
            'amount' => ['required','numeric','integer'],
            'currency' => ['required','string'],
            'fake_created_at' => ['required','date'],
            'transaction' => ['required','string',Rule::in(['deposit', 'withdrawal'])],   
            'img' => ['image','max:2000',],       
        ]);
       
        $faketran =  FakeTransaction::find($id);
        $faketran->name= $request->name;
        $faketran->amount= $request->amount;
        $faketran->currency= $request->currency;
        $faketran->transaction= $request->transaction;
        $faketran->created_at= $request->fake_created_at;
        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($faketran->photo_path);  
            $faketran->photo_path = $request->icon->storePublicly('transactions','public');               
         }
        
        $faketran->update();

        return redirect()->route('admin.faketransaction.index')->with('success','Fake transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $faketran = FakeTransaction::find($id);
        Storage::disk('public')->delete($faketran->photo_path);
        $faketran->delete();
        return redirect()->back()->with('success','Fake transaction successfully deleted');
    }
}
