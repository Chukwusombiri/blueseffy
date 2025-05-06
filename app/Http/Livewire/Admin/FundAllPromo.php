<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use App\Models\User;
use App\Notifications\PromoNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;

class FundAllPromo extends ModalComponent
{
    public $amount;
    public $name;
    public $promo_message;

    protected function rules()
    {
        return [
            'amount' => ['required', 'numeric', 'integer'],
            'name' => ['required', 'string'],
            'promo_message' => ['required', 'string'],
        ];
    }

    protected $validationAttributes = [
        'promo_message' => 'promo description',
        'name' => 'promo name',
    ];

    public function submit()
    {
        $this->validate();
        $sentUsers = session()->pull('sentUsers') ?? [];
        $allUsers = User::whereNotIn('is_admin', [1])->whereNotNull('email_verified_at')->get()->filter(function ($user) {
            return Validator::make([
                'email' => $user->email
            ], [
                'email' => 'required|email',
            ])->passes();
        })->values();

        if ($allUsers->isEmpty()) {
            session()->flash('result', 'You do not have any registered users.');
        }

        $users = $allUsers->whereNotIn('id',$sentUsers);

        if($users->isEmpty()){            
            return $this->closeModalWithEvents(['addedFundAllPromo']);
        }   


        try {        
            $chunks = $users->chunk(10);
            foreach ($chunks as $key => $chunkUsers) {
                foreach ($chunkUsers as $user) {
                    $promo = new Promo();
                    $promo->name = $this->name;
                    $promo->amount = $this->amount;
                    $promo->user_id = $user->id;
                    $promo->save();
                    $user->acROI += $this->amount;
                    $user->update();
                    $sentUsers[] = $user->id;
                    try {
                        $user->notify(new PromoNotification($promo, $this->promo_message));                    
                    } catch (\Throwable $th) {
                        Log::warning('Promo email failed for '.$user->email.': '.$th->getMessage());
                    }
                }

                session()->put('sentUsers',$sentUsers);
            }  

            session()->forget('sentUsers');
            $this->closeModalWithEvents(['addedFundAllPromo']);
        } catch (\Throwable $th) {
            session()->put('sentUsers',$sentUsers);
            Log::error('Promo Operation failed: '.$th->getMessage());
            session()->flash('result', 'Ouch! Something went wrong, please contact site developer.');
        }
    }

    public function render()
    {
        return view('livewire.admin.fund-all-promo');
    }
}
