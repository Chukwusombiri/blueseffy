<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function topup(){
        $plans=Plan::all();
        $useraccounts=User::all();                        
        foreach($useraccounts as $account){
            foreach ($plans as $p => $plan) {
                if(($plan->min<=$account->acBal) && ($account->acBal<=$plan->max)){
                    if($plan->duration >= $account->counter){
                        $interest = $plan->interest/100;
                        $rate = $interest/$plan->duration;
                        $topup=$account->acBal*$rate;                       
                        $account->acROI=round($account->acROI + $topup);
                        $account->counter = $account->counter + 1;
                        $account->update();
                    }else{
                        $account->acBal = 0;
                        $account->counter = 0;
                        $account->done=1;
                        $account->update();
                    }                        
                }
            }                                
        }
    }
}
