<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqsController extends Controller
{

    private $faqs;

    public function __construct()
    {
        $this->faqs = Faq::orderBy('id','desc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {              
        return view('admin.faqs')->with([            
            'faqs' => $this->faqs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                            
        return view('admin.addfaqs');
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
            'question' => ['required','string','unique:App\Models\Faq,question'],
            'answer' => ['required','string'],            
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;        

        $faq->save();
        return redirect()->route('admin.faqs')->with('success','FAQ created successfully');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $faq = Faq::find($id);        
        return view('admin.editfaq')->with([
           
            'faq'=>$faq,
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
        $faq = Faq::find($id);

        $this->validate($request,[
            'question' => ['required','string',Rule::unique('faqs')->ignore($faq->question),],
            'answer' => ['required','string'],            
        ]);

       
        $faq->question = $request->question;
        $faq->answer = $request->answer;        

        $faq->update();
        return redirect()->route('admin.faqs')->with('success','FAQ changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
      
        $faq->delete();

        return redirect()->route('admin.faqs')->with('success','FAQ deleted successfully');
    }
}
