<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateContact extends Component
{
    public User $user;
    public $marital_status;
    public $occupation;
    public $address;
    public $country;    

    protected function rules(){ return [
        'marital_status'=>[Rule::excludeIf(!$this->marital_status),'string','in:single,married,divorced'],
            'occupation'=>[Rule::excludeIf(!$this->occupation),'string'],
            'address'=>[Rule::excludeIf(!$this->address),'string'],
            'country'=>[Rule::excludeIf(!$this->country),'string'],
    ];}

    protected $validationAttributes=[
        'marital_status'=>'Marital status'
    ];

    public function mount(){
        $this->user = User::find(auth()->user()->id);
        if($this->user->contact){
            $this->marital_status = $this->user->contact->marital_status; 
            $this->occupation = $this->user->contact->occupation;
            $this->country = $this->user->contact->country;
            $this->address = $this->user->contact->address;
        }
    }

    public function save(){
        $this->validate();

        $contact = new Contact();
        $contact->user_id = $this->user->id;
        if($this->occupation){
            $contact->occupation = $this->occupation;
        }
        if($this->address){
            $contact->address = $this->address;
        }
        if($this->marital_status){
            $contact->marital_status = $this->marital_status;
        }
        if($this->country){
            $contact->country = $this->country;
        }
        $contact->save();
        $this->emit('saved');

        $this->emit('refresh-navigation-menu');        
    }

    public function render()
    {
        return view('livewire.update-contact');
    }
}
