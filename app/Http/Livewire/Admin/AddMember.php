<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rules;

class AddMember extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;

    protected function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'phone' => ['required',
            'phone:AD,AE,AF,AG,AI,AL,AM,AO,
            AQ,AR,AS,AT,AU,AW,AX,AZ,BA,BB,BD,BE,BF,BG,BH,BI,BJ,
            BL,BM,BN,BO,BQ,BR,BS,BT,BV,BW,BY,BZ,CA,CC,CF,CG,CH,
            CH,CI,CK,CL,CM,CN,CO,CR,CU,CV,CW,CX,CY,CZ,DE,DJ,DK,
            DM,DO,DZ,EC,EE,EG,EH,ER,ES,ET,FI,FJ,FK,FM,FO,FR,GA,
            GB,GE,GD,GF,GG,GH,GI,GL,GM,GN,GP,GQ,GR,GS,GT,GU,GW,
            GY,HK,HM,HN,HR,HT,HU,ID,IE,IL,IM,IN,IO,IQ,IR,IS,IT,
            JE,JM,JO,JP,KE,KG,KH,KI,KM,KN,KP,KR,KW,KY,KZ,LA,LB,
            LC,LI,LK,LR,LS,LT,LU,LV,LY,MA,MC,MD,ME,MF,MG,MH,MK,
            ML,MM,MN,MO,MP,MQ,MR,MS,MT,MU,MV,MW,MX,MY,MZ,NA,NC,
            NE,NF,NG,NI,NL,NO,NR,NU,NZ,OM,PA,PE,PF,PG,PH,PK,PL,
            PN,PR,PS,PT,PW,PY,QA,RE,RN,RO,RS,RU,RW,SA,SB,SC,SD,
            SZ,SE,SG,SH,SI,SJ,SK,SL,SM,SN,SO,SR,SS,ST,SV,SX,SY,
            PM,TC,TD,TF,TG,TH,TJ,TK,TL,TM,TN,TO,TR,TT,TV,TW,TZ,
            UA,UG,UM,US,UY,UZ,VA,VC,VE,VG,VI,VU,WF,YT,ZA,ZM,ZW,
            ',],
            'password' => ['required', 'confirmed', Rules\Password::min(8)],           
        ];
    }

    public function save(){
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), 
            'phone'=>$this->phone,             
        ]);

        $user->ref_link = route('register',['ref'=>$user->id]);  
        $user->profile_photo_path = 'profile-photos/user.png';   
        $user->save();

        $this->closeModalWithEvents(['addedMember']);
    }
    public function render()
    {
        return view('livewire.admin.add-member');
    }
}
