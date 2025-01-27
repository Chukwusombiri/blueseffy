<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){               
        $plans = Plan::all();
        return view('admin.plans')->with(['plans'=>$plans,
        ]);
    }

    public function create(){               
        return view('admin.addplan');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>['required','string','unique:plans,name'],
            'interest'=>['required','numeric'],
            'min'=>['required','numeric'],
            'max'=>['required','numeric','gt:min'],  
            'duration'=>['required','numeric'], 
            'ref_commission'=>['required','numeric'],          
        ]);

        $plan = new Plan();
        $plan->name = $request->name;
        $plan->interest = $request->interest;         
        $plan->min = $request->min;         
        $plan->max = $request->max;         
        $plan->duration = $request->duration;   
        $plan->ref_commission = $request->ref_commission;         
        $plan->save();

        return redirect()->route('admin.plans')->with('success', 'Investment plan successfully added');
    }

    public function edit($id){
        $plan =  Plan::find($id);               
        return view('admin.editplan')->with([
            'plan'=>$plan,
        ]);
    }

    public function update(Request $request,$id){
        $plan = Plan::find($id);
        $this->validate($request,[
            'name'=>['required','string','unique:plans,name,'.$plan->id],
            'interest'=>['required','numeric','between:0.01,99.99'],
            'min'=>['required','numeric'],
            'max'=>['required','numeric','gt:min'],  
            'duration'=>['required','numeric'], 
            'ref_commission'=>['required','numeric'],         
        ]);
       
        $plan->name = $request->name;
        $plan->interest = $request->interest;         
        $plan->min = $request->min;         
        $plan->max = $request->max;         
        $plan->duration = $request->duration;    
        $plan->ref_commission = $request->ref_commission;      
        $plan->update();

        return redirect()->route('admin.plans')->with('success', 'Investment plan successfully updated');
    }


    public function destroy($id){
        Plan::find($id)->delete();
        return redirect()->back()->with('success', 'Investment plan successfully Deleted');
    }
}
