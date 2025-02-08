<?php
namespace App\Http\Livewire\User;

use App\Models\InvestmentDeposit;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class UserReceipt extends ModalComponent
{
    use WithFileUploads;
    public $investment;
    public $receipt;
    
    public function mount($id){
        $this->investment = InvestmentDeposit::findOrFail($id);
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

        if($this->investment->receipt != null){
            Storage::disk('public')->delete($this->investment->receipt);
        }

        $this->investment->receipt = $this->receipt->storePublicly('receipts','public');
        $this->investment->save();
        $this->closeModalWithEvents(['uploadedReceipt']);
    }

    public function render()
    {
        return view('livewire.user.user-receipt');
    }
}
