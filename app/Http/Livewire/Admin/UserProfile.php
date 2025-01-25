<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class UserProfile extends ModalComponent
{
    use WithFileUploads;

    public $photo;
    public $name;
    public $email;
    public $phone;
    public $marital_status;
    public $trading_status;
    public $occupation;
    public $address;
    public $country;    
    public $acROI;
    public $acBal;
    public $doBal;
    public $totBal;   
    public $percent; 
    public User $user;    
    protected $listeners = ['removedImage'=>'$refresh'];

    public function mount(User $user){
        $this->user =$user;  
        $this->name = $user->name;        
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->acROI = $user->acROI;
        $this->acBal = $user->acBal;
        $this->doBal = $user->doBal;
        $this->totBal = $user->totBal;
        $this->trading_status = $user->status;
        $this->percent = $user->percent;
        if($this->user->contact){
            $this->marital_status = $this->user->contact->marital_status; 
            $this->occupation = $this->user->contact->occupation;
            $this->country = $this->user->contact->country;
            $this->address = $this->user->contact->address;
        }
    }

    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
   

    public function submit()
    {
       $this->validate();
      
       $user = User::find($this->user->id);
       $user->name = $this->name;
       $user->email = $this->email;
       $user->phone = $this->phone;      
       $user->acBal=$this->acBal;
       $user->acROI=$this->acROI;
       $user->totBal=$this->totBal;
       $user->doBal=$this->doBal;
       $user->status=$this->trading_status;
       $user->percent = $this->percent;
       if($this->photo){
        $user->profile_photo_path = $this->photo->storePublicly('profile-photos','public');
       }
       $user->save();

       if($this->occupation || $this->address || $this->country || $this->marital_status){
        $contact =  new Contact();
        $contact->user_id = $this->user->id;
        if($this->occupation){
            $contact->occupation = $this->occupation;
        }
        if($this->address){
            $contact->address = $this->address;
        }
        if($this->marital_status){
            $contact->marital_status = $this->marital_status;
        }
        if($this->country){
            $contact->country = $this->country;
        }
        $contact->save();
       }       
       $this->closeModalWithEvents(['userUpdated']);
    }

    public function render()
    {       
        return view('livewire.admin.user-profile');
    }

    protected function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users','email')->ignore($this->user->id)],
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
            'photo'=>[Rule::excludeIf(!$this->photo),'image','max:2000'],           
            'acBal'=>['required','integer','numeric'],              
            'acROI'=>['required','numeric'],   
            'totBal'=>['required','numeric'],
            'doBal'=>['required','integer','numeric'],
            'trading_status'=>['required','string','in:active,not_earning,dormant,earning'],
            'marital_status'=>[Rule::excludeIf(!$this->marital_status),'string','in:single,married,divorced'],
            'occupation'=>[Rule::excludeIf(!$this->occupation),'string'],
            'address'=>[Rule::excludeIf(!$this->address),'string'],
            'country'=>[Rule::excludeIf(!$this->country),'string'],
            'percent'=>['required','integer','numeric'],
        ];
    }

    protected $messages = [
        'acROI.required' => 'The Return on Investment cannot be empty. You can set to 0.',
        'acBal.required' => 'The Active Capital cannot be empty. You can set to 0.',
        'doBal.required' => 'The Dormont Capital cannot be empty. You can set to 0.',
        'totBal.required' => 'The Totak Wallet Value cannot be empty. You can set to 0.',
    ];

    protected $validationAttributes = [
        'acROI' => 'Return on investment',
        'acBal' => 'Active Capital',
        'doBal' => 'Dormant Capital',
        'totBal' => 'Total Funds',
        'trading_status'=>'Trading status'
    ];
}
