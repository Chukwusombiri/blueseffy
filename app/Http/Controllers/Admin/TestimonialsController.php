<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{

    private $testimonials;

    public function __construct()
    {
        $this->testimonials = Testimonial::orderBy('id','desc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {              
        return view('admin.testimonials')->with([
            'testimonials' => $this->testimonials,           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prev_url = url()->previous();
        return view('admin.addtestimonial',['prev_url'=>$prev_url]);
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
            'testifier' => ['required','string'],
            'testifier_job' => ['required','string'],  
            'testimony'=>['required','string'],         
            'testifier_img' => ['required','image','max:1999']
        ]);

        $testimonial =  new Testimonial();                
        $testimonial->testifier_img = $request->testifier_img->storePublicly('testifiers','public');             
        $testimonial->testifier= $request->testifier;
        $testimonial->testifier_job= $request->testifier_job; 
        $testimonial->testimony= $request->testimony;
        $testimonial->save();

        return redirect()->route('admin.testimonials')->with('success','Testimonial created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $testimonial = Testimonial::find($id);             
        return view('admin.edittestimonial')->with(['testimonial' => $testimonial,]);
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
            'testifier' => ['required','string'],
            'testifier_job' => ['required','string'],  
            'testimony'=>['required','string'],         
            'testifier_img' => ['image','max:1999']
        ]);

        $testimonial =  Testimonial::find($id);

        if ($request->hasFile('testifier_img')) {
          $testimonial->testifier_img = $request->testifier_img->storePulicly('testifiers','public');
        }
        
        $testimonial->testifier= $request->testifier;
        $testimonial->testifier_job= $request->testifier_job; 
        $testimonial->testimony= $request->testimony;               

        $testimonial->update();

        return redirect()->route('admin.testimonials')->with('success','Testimonial modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);        
        Storage::disk('public')->delete($testimonial->testifier_img);        
        $testimonial->delete();

        return redirect()->route('admin.testimonials')->with('success','Testimonial deleted successfully');
    }
}
