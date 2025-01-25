<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    private $comments;

    public function __construct()
    {
        $this->comments = Comment::orderBy('id','desc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $prev_url = url()->previous();
        return view('admin.comments')->with([
            'comments' => $this->comments,
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
        $articles = Article::select('id','title')->get(); 
        $prev_url = url()->previous();
        return view('admin.addcomment')->with([
            'articles' => $articles,
            'prev_url'=>$prev_url
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
            'commenter' => ['required','string',],
            'comment' => ['required','string'],
            'commenter_img'=>['image','max:1999'],
            'article_id'=>['required','exists:App\Models\Article,id'],
        ]);

        $comment = new Comment();
        $comment->commenter = $request->commenter;
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        if ($request->hasFile('commenter_img')) {

            //Get file Extension
            $getFileNameWithExt  = $request->file('commenter_img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($getFileNameWithExt, PATHINFO_FILENAME);
            //get file ext
            $fileExt  = $request->file('commenter_img')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            //store file
            $path = $request->file('commenter_img')->storeAs('public/commenters', $fileNameToStore);
 
         }else {
             $fileNameToStore = 'avatar.jpg';
         }
        $comment->commenter_img = $fileNameToStore;

        $comment->save();
        return redirect()->route('admin.comments')->with('success','Comment created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                
        $comment = Comment::find($id);
        $prev_url = url()->previous();
        $articles = Article::select('id','title')->get();       

        return view('admin.editcomment')->with([            
            'comment'=>$comment, 
            'articles'=>$articles,   
            'prev_url'=>$prev_url   
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
            'commenter' => ['required','string',],
            'comment' => ['required','string'],
            'commenter_img'=>['image','max:1999'],
            'article_id'=>['required','exists:App\Models\Article,id'],
        ]);

        $comment = Comment::find($id);
        $comment->commenter = $request->commenter;
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;  
        if ($request->hasFile('commenter_img')) {

            //Get file Extension
            $getFileNameWithExt  = $request->file('commenter_img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($getFileNameWithExt, PATHINFO_FILENAME);
            //get file ext
            $fileExt  = $request->file('commenter_img')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            //store file
            $path = $request->file('commenter_img')->storeAs('public/commenters', $fileNameToStore);;

            $oldimage = $comment->commenter_img;

            $comment->commenter_img = $fileNameToStore;
            if($oldimage!='avatar.jpg'){
                Storage::delete('/public/commenters/'.$oldimage);
            }           

        }        

        $comment->update();
        return redirect()->route('admin.comments')->with('success','Comment modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if($comment->commenter_img != 'avatar.jpg'){
            Storage::delete('/public/commenters/'.$comment->commenter_img);
        }
      
        $comment->delete();

        return redirect()->route('admin.comments')->with('success','Comments deleted successfully');
    }
}
