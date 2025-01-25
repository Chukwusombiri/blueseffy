<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bot;
use LivewireUI\Modal\ModalComponent;

class EditBot extends ModalComponent
{
    public $bot;
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

    public function mount(Bot $bot){
        $this->bot = $bot;
        $this->name = $bot->name;
        $this->price = $bot->price;
        $this->multiplier = $bot->multiplier;
        $this->duration = $bot->duration;
    }

    public function updated($prop){
        $this->validateOnly($prop);
    }

    public function save(){
        $this->validate();
        try{
            $bot = Bot::findOrFail($this->bot->id);
            $bot->name = $this->name;
            $bot->price = $this->price;
            $bot->multiplier = $this->multiplier;
            $bot->duration = $this->duration;
            $bot->save();
            $this->closeModalWithEvents(['botEdited']);
        }catch(\Throwable $th){
            session()->flash('error','Oops! Something went wrong, try again later.');
            return;
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-bot');
    }
}
