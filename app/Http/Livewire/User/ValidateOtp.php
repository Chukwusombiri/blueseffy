<?php

namespace App\Http\Livewire\User;

use App\Models\FiatWithdrawal;
use App\Models\Otp;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ValidateOtp extends ModalComponent
{
    public $withdrawal;
    public $isSent = false;
    public $otp;

    protected function rules()
    {
        return [
            'otp' => ['string', 'exists:otps,otp_code']
        ];
    }

    protected $validationAttributes = [
        'otp' => 'One Time Password'
    ];

    public function mount($id)
    {
        $this->withdrawal = FiatWithdrawal::findOrFail($id);
    }

    protected $listeners = [
        'open_Modal' => 'openMyModal'
    ];

    public function send()
    {
        $this->isSent = false;
        $generated_otp = rand(100000, 999999);
        $user = User::find($this->withdrawal->user_id);
        Otp::where('user_id', $user->id)->delete();
        $otp = new Otp();
        $otp->fiat_withdrawal_id = $this->withdrawal->id;
        $otp->expires = Carbon::now()->addMinutes(5);
        $otp->otp_code = $generated_otp;
        $otp->user_id = auth()->user()->id;
        if ($otp->save()) {
            $user->notify(new SendOtpNotification($generated_otp));
        }
        $this->isSent = true;
    }

    public function save()
    {
        $this->isSent = false;
        $this->validate();
        $sent_otp = Otp::where('user_id', auth()->user()->id)->first();

        if ($sent_otp->expires < Carbon::now()) {
            session()->flash('result', 'One time password has expired. Request new OTP.');
            $this->reset(['otp']);
        } else {
            FiatWithdrawal::find($sent_otp->fiat_withdrawal_id)->update(['is_verified' => true]);
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
