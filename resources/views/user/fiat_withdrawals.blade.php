<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Fiat withdrawals
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Account Fiat withdrawal records. Create new fiat withdrawal<br>
                 Last Login: {{auth()->user()->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section>
    <!-- Breadcrumb End -->
    <section  class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">       
            <div class="mb-20">              
                <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold">Fiat Withdrawals</span>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">How to create a fiat withdrawal</h2>
            </div>
            <div class="mycontainer pb-3">
                <p class="text-slate-900 text-xl font-bold">Withdraw your investment Returns into your preferred Bank account instantly through these steps</p>
                <ul role="list" class="space-y-4 py-4 text-slate-600">
                    <li><i class="las la-check-square"></i> Select make withdrawals.</li>                    
                    <li><i class="las la-check-square"></i> Enter your intended amount</li>
                    <li><i class="las la-check-square"></i> Endeavor to enter withdrawal amount less or equal to your ROI</li> 
                    <li><i class="las la-check-square"></i> Enter your transaction details</li>
                    <li><i class="las la-check-square"></i> Request OTP and validate your withdrawl to bank account</li>                                       
                </ul>                
                <a href="{{route('user.fiat_withdrawal.create')}}" 
                class="flex flex-nowrap justify-start items-center bg-indigo-400
                 text-white px-4 py-2 rounded-md mt-4 w-max"><i class="las la-plus"></i> Make Withdrawal</a>
            </div>
           
            @livewire('user.fiat-withdrawal-list')
    </section> 
</x-app-layout>