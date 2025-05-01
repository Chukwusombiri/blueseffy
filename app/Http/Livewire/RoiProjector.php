<?php

namespace App\Http\Livewire;

use App\Mail\ROIProjectorMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class RoiProjector extends Component
{
    public $name;
    public $email;
    public $amount;
    public $rate;
    public $duration;
    public $comment;

    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email:dns,rfc'],
            'amount' => ['required', 'numeric', 'integer', 'min:100'],
            'rate' => ['required', 'string', 'in:days,weeks,months,years'],
            'duration' => ['required', 'integer', 'min:1'],
            'comment' => [Rule::excludeIf(!$this->comment), 'string']
        ];
    }

    public function messages()
    {
        return [
            'duration.min' => 'The duration must be greater than zero.',
            'amount.min' => 'The Amount must be greater than $100.',
        ];
    }

    public function submit()
    {
        $this->validate();
        //Mail::to(config('app.email'))->send(new ROIProjectorMail($this->name, $this->email, $this->amount, $this->rate, $this->duration, $this->comment));
        $this->emit('roiProjectorSubmitted');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.roi-projector');
    }
}
