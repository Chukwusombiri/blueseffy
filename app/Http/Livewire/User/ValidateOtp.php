<?php

namespace App\Http\Livewire\User;

use App\Models\FiatWithdrawal;
use App\Models\Otp;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class ValidateOtp extends ModalComponent
{
    public string|FiatWithdrawal $withdrawal;
    public $sent='';
    public $otp;    

    protected function rules(){ return [
        'otp'=>[Rule::excludeIf(!$this->otp),'exists:otps,otp_code']
    ];}

    protected $validationAttributes=[
        'otp'=>'One Time Password'
    ];

    public function mount(string|FiatWithdrawal $withdrawal){
        $this->withdrawal =$withdrawal;       
    }

    protected $listeners = [
        'open_Modal'=>'openMyModal'
    ];

    public function send(){
        $this->sent = '';
        $generated_otp = rand(100000,999999);   
        $n_withdrawal = FiatWithdrawal::find($this->withdrawal);
        $user = User::find($n_withdrawal->user_id);             
        Otp::where('user_id',$user->id)->delete();
        $otp = new Otp();
        $otp->fiat_withdrawal_id = $n_withdrawal->id;   
        $otp->expires = Carbon::now()->addMinutes(5);
        $otp->otp_code = $generated_otp;
        $otp->user_id = auth()->user()->id;
        if($otp->save()){
            $user->notify(new SendOtpNotification($generated_otp));
        }        
        $this->sent = 'sent';
    }

    public function save(){
        $this->validate();
        $n_withdrawal = FiatWithdrawal::find($this->withdrawal);

        $sent_otp = Otp::where('otp_code',$this->otp)
        ->where('user_id',auth()->user()->id)->first();

        if($sent_otp->expires<Carbon::now()){
            session()->flash('result','One time password has expired. Request new OTP.');            
            $this->reset(['otp','sent']);
        }else{
            FiatWithdrawal::find($sent_otp->fiat_withdrawal_id)->update(['is_verified'=>true]);                       
            $this->closeModalWithEvents(['swalwit']);
        }
    }
    public function render()
    {
        return view('livewire.user.validate-otp');
    }

    public static function closeModalOnClickAway(): bool
{
    return false;
}
}
