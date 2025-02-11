<?php

namespace App\Http\Livewire\User;

use App\Models\FundingDeposit;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class UserDepositReceipt extends ModalComponent
{
    use WithFileUploads;
    public $deposit;
    public $receipt;
    
    public function mount($id){
        $this->deposit = FundingDeposit::findOrFail($id);
    } 

    protected function rules(){
        return [
            'receipt'=>['required','image','max:1999']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        if($this->deposit->receipt != null){
            Storage::disk('public')->delete($this->deposit->receipt);
        }

        $this->deposit->receipt = $this->receipt->storePublicly('receipts','public');
        $this->deposit->save();
        $this->closeModalWithEvents(['uploadedReceipt']);
    }

    public function render()
    {
        return view('livewire.user.user-deposit-receipt');
    }
}
