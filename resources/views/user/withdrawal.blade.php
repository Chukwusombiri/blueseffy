<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Cryptocurrency withdrawal
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Account cryptocurrency withdrawal records. Create new cryptocurrency withdrawal<br>
                 Last Login: {{$user->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section>
    <!-- Breadcrumb End -->
    <section  class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">       
            <div class="mb-20">              
                <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold mb-7">Withdrawals</span>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">How to create a crytocrrency withdrawal</h2>
            </div>
            <div class="mycontainer pb-3">
                <p class="text-slate-900 text-xl font-bold">Withdraw your investment Returns into your preferred cryptocurrency wallet instantly through these steps</p>
                <ul role="list" class="space-y-4 py-4 text-slate-600">
                    <li><i class="las la-check-square"></i> Select make withdrawals.</li>                    
                    <li><i class="las la-check-square"></i> Enter your intended amount</li>
                    <li><i class="las la-check-square"></i> Endeavor to enter withdrawal less or eqauls your ROI</li>
                    <li><i class="las la-check-square"></i> Select your desired wallet for cryptocurrency</li>
                </ul>
                <p>NB: For security protocols, sometimes you may be prompted to confirm your password before prooceeding further into this account funding.</p>
                <a href="{{route('user.withdrawal.create')}}" 
                class="flex flex-nowrap justify-start items-center bg-indigo-400
                 text-white px-4 py-2 rounded-md mt-4 w-max"><i class="las la-plus"></i> Make Withdrawal</a>
            </div>
           
            @livewire('user.withdrawal-list')
    </section> 
</x-app-layout>