<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;

    public function __construct()
    {
        $this->categories = Category::orderBy('id','desc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $prev_url = url()->previous();    
        return view('admin.categories')->with(['categories'=>$this->categories,
        'prev_url'=>$prev_url 
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
        return view('admin.addcategory',['prev_url'=>$prev_url]);
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
            'name' => 'required|string'
        ]);

        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect()->route('admin.categories')->with('success','New Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = Category::find($id);
        $prev_url = url()->previous();
        return view('admin.editcategory')->with([            
            'category' => $category,
            'prev_url'=>$prev_url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        $category->update();

        return redirect()->route('admin.categories')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success','Category deleted successfully');
    }
}
