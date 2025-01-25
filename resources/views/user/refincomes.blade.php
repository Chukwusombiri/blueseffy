<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Affiliate Program
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                See your referral earnings. View your referrals.
                 Last Login: {{auth()->user()->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section> 
    <section class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">
        <div class="mycontainer">
            <div class="mb-20">
                <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold mb-4">Referral Income</span>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">Earn more daily through referrals</h2>
            </div>
            <div class="pb-3">
                <p class="text-slate-900 text-lg font-normal">BLUESTECH affiliate program has helped members achieve their goals faster and smarter. Invite your friends, colleagues and 
                    family members to join you at BLUESTECH - this will increase your cash flow and also give your a bigger opportunites to explore some of the numerous offer here at 
                    BLUESTECH. 
                </p>
                <ul role="list" class="space-y-4 py-4 text-slate-600">
                    <li><i class="las la-check-square"></i> Earn more income through boosting your network by inviting more people.</li>
                    <li><i class="las la-check-square"></i> Start earning and fulfilling your goals by inviting friends.</li> 
                    <li><i class="las la-check-square"></i> Your affiliate income records are listed in reverse chronology</li>                    
                </ul>
            </div>                               
            <div id="profile">                                   
                <h2 class="mt-20 mb-7 text-xl text-slate-900 font-extrabold">Affiliate Income History</h2>
                <div class="card" style="border-top: 1px solid #000;margin-top: 20x">
                    <div class="card-header">
                        <h3>
                            My Affiliate Incomes
                        </h3>           
                        <a href="{{route('user.downline')}}" class="mybtn"><i class="las la-eye-open"></i> view Referrals</a>            
                    </div>
                    <div class="card-body table-responsive-md ">
                        <table class="table text-nowrap" style="overflow: scroll">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Downline</th>          
                                <th>Transacted</th>                                                                                                     
                              </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($refincomes as $r=>$refincome)
                                    <tr class="hover:bg-slate-200">
                                        <td>{{$r+1}}</td>
                                        <td>${{$refincome->amount}}</td>
                                        <td>
                                         {{$refincome->downline->name}} 
                                        </td>                                                                  
                                        <td>{{ date('M d, Y', strtotime($refincome->created_at))}}</td>                                                                                               
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