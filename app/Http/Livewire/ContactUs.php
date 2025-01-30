<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactUs extends Component
{
    public $subject;
    public $msg;
    public $email;
    public $phone;
    public $response;

    protected $rules=[
        'subject' => ['required','string',],
        'msg' => ['required','string'],
        'email'=>['required','email',]
    ];

    protected $validationAttributes = [
        'msg' => 'Message'
    ];

    public function submit(){
        $this->validate();

        $email = $this->email;
        $msg = $this->msg;
        $sjt = $this->subject;
        $company = Company::first();
        $emailTo = $company->email;
        Mail::to($emailTo)->send(new ContactMail($msg, $sjt,$email));
        $this->response = 'done';
        $this->email= '';
        $this->msg='';
        $this->subject='';
        $this->phone = '';

        $this->emit('contactedUs');
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
