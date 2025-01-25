<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class UploadPdf extends ModalComponent
{
    use WithFileUploads;
    public $pdf;

    protected $rules=[
        'pdf'=>['required','file','max:2000','mimetypes:application/pdf']
    ];

    public function uploadDocument(){
        $this->validate();

        $company = Company::first();
        if($company->pdf!=null){
            Storage::disk('public')->delete($company->pdf);
        }
        $path = $this->pdf->storePublicly('our_company','public');
        
        $company->pdf = $path;
        if($company->update()){
            $this->closeModalWithEvents(['uploadedDocument']);
        };
      
    }

    public function render()
    {
        return view('livewire.admin.upload-pdf');
    }
}
