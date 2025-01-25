<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use App\Notifications\BulkEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function getmail($id=null){        
        if($user = User::find($id)){
            return view('admin.email.getmail')->with(['single'=>$user]);
        } else {
            $users = User::whereNotIn('is_admin', [1])->get();            
            return view('admin.email.getmail')->with(['users'=>$users]);
        }        
    }

    public function sendmail(Request $request){
        
        $this->validate($request,[
            'sjt' => ['required','string'],
            'msg' => ['required','string'],
            'email' => ['required','exists:App\Models\User,email'],
        ]);

            $email = $request->email;
            $msg = $request->msg;
            $sjt = $request->sjt;

            Mail::to($email)->send(new SendMail($msg, $sjt));
            
            return redirect()->route('admin.getmail')->with('success','Email was sent successfully');                  
    }

    public function sendBulkemail(){               
        return view('admin.email.sendBulkemail');
    }

    public function bulkemail(Request $request)
    {
        $this->validate($request,[
            'mail_subject' => ['required','string'],
            'mail_body' => ['required','string'],            
        ]);
       
        $subject = $request->mail_subject;
        $body = $request->mail_body;
        
        if($investors = User::whereNotIn('is_admin',[1])->get()){
            foreach ($investors as $i => $investor) {
                $investor->notify(new BulkEmailNotification($subject,$body));
            }                
            return redirect()->back()->with('success','Bulk Mail successfully sent.');
        }else{
            
            return redirect()->back()->with('error','We couldn\'t find investors email.');
        }    
        
    }
}
