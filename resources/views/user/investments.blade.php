<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Investment History
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Account Investments and records. Start a new investment.<br>
                 Last Login: {{$user->last_sign_in_at}} <br>
                 Status: <span  class="inline-block py-1 px-2 rounded-full bg-indigo-400">@switch($user->status)
                     @case('earning')
                         {{'ACTIVE TRADING'}}
                         @break
                     @case('not_earning')
                        {{'TRADING SESSION COMPLETED'}}
                        @break
                    @case('dormant')
                        {{'DORMANT'}}
                        @break
                    @case('active')
                        {{'YET TO TRADE'}}
                        @break                    
                 @endswitch</span>
              </p>
           </div>
        </div>
     </section>
    <section class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">     
            <div class="mb-20">
                <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold">Investment History</span>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">Do you want to invest now?</h2>
            </div>
            <div class="mycontainer pb-3">
                <p class="text-slate-900 text-xl font-bold">Invest Funds into your Portfolio and start earning instantly with these steps</p>
                <ul role="list" class="space-y-4 py-4 text-slate-600">
                    <li><i class="las la-check-square"></i> click 'start investment' button.</li>
                    <li><i class="las la-check-square"></i> Choose your suitable Investment plan</li>
                    <li><i class="las la-check-square"></i> Enter your intended amount to invest</li>
                    <li><i class="las la-check-square"></i> Select your preferred payment cryptocurrency</li>
                    <li><i class="las la-check-square"></i> You can also choose to fund your investment through your available dormant funds</li>
                </ul>
                <p>NB: For security protocols, sometimes you may be prompted to confirm your password before prooceeding further into this making</p>
                <a href="{{route('pricing')}}"
                     class="flex flex-nowrap justify-start items-center bg-indigo-400 text-white px-4 py-2 rounded-md mt-4 w-max">
                     <i class="las la-plus">
                    </i> Start Investment</a>
            </div>
           
            @livewire('user.investment-list')
    </section>
</x-app-layout>
<script>
    Livewire.on('uploadedReceipt',(e) => {
      toastr.success('Upload successful')
    })
</script>