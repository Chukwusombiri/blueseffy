<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Affiliate Network
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                View your referrals. See when your referral joined BLUESTECH.
                 Last Login: {{auth()->user()->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section> 
    <section class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">
        <div class="mycontainer">
            <div class="mb-20">
                <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold">Referral Network</span>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">Do you want to know more about your network</h2>
            </div>
            <div class="pb-3">
                <p class="text-slate-900 text-lg font-normal">You can earn even more income by inviting family and friends. You will be compensated with a whooping percentage of any amount they deposit into their account.
                     You will also stand a very big chance to benefit during our quaterly promotional rewards to our most active members.
                </p>
                <ul role="list" class="space-y-4 py-4 text-slate-600">
                    <li><i class="las la-check-square"></i> Buff up your network by inviting more people.</li>
                    <li><i class="las la-check-square"></i> Start earning and fulfilling your goals by inviting friends.</li> 
                    <li><i class="las la-check-square"></i> Your affiliate income records are listed in reverse chronology.</li>                    
                </ul>
            </div>                               
            <div id="profile">                                   
                <h2 class="mt-20 mb-7 text-xl text-slate-900 font-extrabold">Affiliate History</h2>               
                <div class="card" style="border-top: 1px solid #000;margin-top: 20x">
                    <div class="card-header">
                        <h3>
                            My Affiliates
                        </h3>           
                        <a href="{{route('user.refincome')}}" class="mybtn"><i class="las la-eye-open"></i> view Affiliate Income</a>            
                    </div>
                    <div class="card-body table-responsive-md ">
                        <table class="table table-hover text-nowrap" style="overflow: scroll">
                            <thead>
                              <tr>
                                <th>ID</th>                                
                                <th>Name</th>          
                                <th>Joined</th>                                                                                                     
                              </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($downlines as $d=>$downline)
                                    <tr class="hover:bg-slate-200">
                                        <td>{{dr+1}}</td>                                        
                                        <td>
                                         {{$downline->referred->name}}  
                                        </td>                                                                  
                                        <td>{{ date('M d, Y', strtotime($downline->created_at))}}</td>                                                                                               
                                    </tr>
                                @endforeach                                                                                    
                            </tbody>
                          </table>                                      
                    </div>
                </div> 
            </div>    
        </div>
    </section>
</x-app-layout>