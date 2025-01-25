<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    
    public function index(){                
        $company = Company::first();
        return view('admin.company_details')->with(['company'=>$company,       
        ]);
    }

    public function edit($id){            
        $company = Company::find($id);
        return view('admin.editcompany_details')->with(['company'=>$company, 
        ]);
    }

    public function update(Request $request,$id)
    {
        $company = Company::find($id);
        $this->validate($request,[
            'name'=>['required','string'],
            'email'=>['required','email'],
            'tel'=>['required','string',],
            'headoffice'=>['required','string'],
            'address'=>['required','string'],           
            'other_office'=>['required','string'],
            'active_accounts'=>['required','numeric',],
            'daily_transactions'=>['required','numeric'],
            'deposits'=>['required','numeric',],
            'withdrawals'=>['required','numeric',],            
            'about_us'=>['required','string',],
            'mission'=>['required','string',],
            'vision'=>['required','string',],
            'phrase'=>['required','string',],            
        ]);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->tel = $request->tel;
        $company->headoffice = $request->headoffice;
        $company->address = $request->address;        
        $company->other_office = $request->other_office;
        $company->active_accounts = $request->active_accounts;
        $company->daily_transactions = $request->daily_transactions;
        $company->deposits = $request->deposits;
        $company->withdrawals = $request->withdrawals;        
        $company->about_us = $request->about_us;
        $company->vision = $request->vision;       
        $company->mission = $request->mission;

        $company->update();
        return redirect()->back()->with('success','Company Details updated successfully.');
    }
    

    public function getCertificate($id)
    {
        $company = Company::find($id);
        $name = 'Certificate_Of_Incorporation.pdf';
        $headers = array(
            'Content-Type: application/pdf',
          );
        return Storage::download('public/'.$company->certificate, $name,$headers);
    }

    public function getPdf($id)
    {
        $company = Company::find($id);
        $name = 'BLUESTECH LTD.pdf';
        $headers = array(
            'Content-Type: application/pdf',
          );
        return Storage::download('public/'.$company->pdf, $name,$headers);
    }
}
