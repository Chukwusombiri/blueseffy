<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use LivewireUI\Modal\ModalComponent;

class AddBot extends ModalComponent
{    
    public $name = '';
    public $price = '';
    public $multiplier = '';
    public $duration = '';

    protected $rules = [
        'name' => 'required|string',
        'price'=>'required|numeric|integer',
        'multiplier'=>'required|numeric|integer',
        'duration'=>'required|numeric|integer',
    ];    

    public function updated($prop){
        $this->validateOnly($prop);
    }

    public function save(){
        $this->validate();
        try{
            $bot = new Bot();
            $bot->name = $this->name;
            $bot->price = $this->price;
            $bot->multiplier = $this->multiplier;
            $bot->duration = $this->duration;
            $bot->save();
            $this->closeModalWithEvents(['botCreated']);
        }catch(\Throwable $th){
            session()->flash('error','Oops! Something\'s not right, try again.');
            return;
        }
    }
    public function render()
    {
        return view('livewire.admin.add-bot');
    }
}
