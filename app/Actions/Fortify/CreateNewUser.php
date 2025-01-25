<?php

namespace App\Actions\Fortify;

use App\Models\Downline;
use App\Models\User;
use App\Notifications\NewDownlineNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required',
            ValidationRule::phone()->country(['AD','AE','AF','AG','AI','AL','AM','AO',
            'AQ','AR','AS','AT','AU','AW','AX','AZ','BA','BB','BD','BE','BF','BG','BH','BI','BJ',
            'BL','BM','BN','BO','BQ','BR','BS','BT','BV','BW','BY','BZ','CA','CC','CF','CG','CH',
            'CH','CI','CK','CL','CM','CN','CO','CR','CU','CV','CW','CX','CY','CZ','DE','DJ','DK',
            'DM','DO','DZ','EC','EE','EG','EH','ER','ES','ET','FI','FJ','FK','FM','FO','FR','GA',
            'GB','GE','GD','GF','GG','GH','GI','GL','GM','GN','GP','GQ','GR','GS','GT','GU','GW',
            'GY','HK','HM','HN','HR','HT','HU','ID','IE','IL','IM','IN','IO','IQ','IR','IS','IT',
            'JE','JM','JO','JP','KE','KG','KH','KI','KM','KN','KP','KR','KW','KY','KZ','LA','LB',
            'LC','LI','LK','LR','LS','LT','LU','LV','LY','MA','MC','MD','ME','MF','MG','MH','MK',
            'ML','MM','MN','MO','MP','MQ','MR','MS','MT','MU','MV','MW','MX','MY','MZ','NA','NC',
            'NE','NF','NG','NI','NL','NO','NR','NU','NZ','OM','PA','PE','PF','PG','PH','PK','PL',
            'PN','PR','PS','PT','PW','PY','QA','RE','RN','RO','RS','RU','RW','SA','SB','SC','SD',
            'SZ','SE','SG','SH','SI','SJ','SK','SL','SM','SN','SO','SR','SS','ST','SV','SX','SY',
            'PM','TC','TD','TF','TG','TH','TJ','TK','TL','TM','TN','TO','TR','TT','TV','TW','TZ',
            'UA','UG','UM','US','UY','UZ','VA','VC','VE','VG','VI','VU','WF','YT','ZA','ZM','ZW',
            ]),],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']), 
            'phone'=>$input['phone'],             
        ]);

        $user->ref_link = route('register',['ref'=>$user->id]);  
        $user->profile_photo_path = 'profile-photos/user.png';   
        $user->save();       
               
            if ( $upline = User::find(session()->pull('referrer'))) {
                $downline = new Downline();
                $downline->downline_id = $user->id;
                $downline->user_id = $upline->id;
                $downline->save();            
                $upline->notify(new NewDownlineNotification($user));  
            }         

        return $user;
    }
}
