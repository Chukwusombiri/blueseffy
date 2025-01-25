<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class UploadCertificate extends ModalComponent
{ use WithFileUploads;
    public $certificate;

    protected $rules=[
        'certificate'=>['required','file','max:2000','mimetypes:application/pdf']
    ];

    public function uploadDocument(){
        $this->validate();

        $company = Company::first();
        if($company->certificate!=null){
            Storage::disk('public')->delete($company->certificate);
        }
        $path = $this->certificate->storePublicly('our_company','public');
        
        $company->certificate = $path;
        if($company->update()){
            $this->closeModalWithEvents(['uploadedDocument']);
        };
      
    }
    public function render()
    {
        return view('livewire.admin.upload-certificate');
    }
}
