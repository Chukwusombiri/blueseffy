<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 FIAT WITHDRAWAL
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Withdraw funds direct to your Bank
                 Last Login: {{auth()->user()->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section>
    <section class="relative overflow-hidden pt-20 pb-20 lg:pt-[120px] lg:pb-[90px]">
        <div class="mycontainer">    
            <div class="mb-20">
                <p class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold mb-7">Make Fiat  Withdrawal</p>
                <h2 class="text-center text-dark text-2xl capitalize mx-auto mb-4 md:w-1/2">Fill out your fiat withdrawal form below.</h2>
                <p class="text-center mx-auto text-slate-600 md:w-1/2">BLUESTECH allows members to withdraw funds direct to their desired bank account. This feature
                is only supported for US dollar bank account. This feature may include support for other fiat currencies in future.</p>
            </div>  
            <div class="mb-20 bg-white px-4 py-2 rounded-sm shadow-md">
                <h3 class="text-slate-900 text-xl font-bold mb-7">Portfolio Value</h3>
                <h4 class="text-slate-700 text-lg font-bold">Return On INVESTMENTS: ${{(!empty(auth()->user()->acROI))?auth()->user()->acROI:"0.00"}}</h4>
                <h4 class="text-slate-700 text-lg font-bold">Active Capital: ${{(!empty(auth()->user()->acbal))?auth()->user()->acbal:"0.00"}}</h4>                
                    <h4 class="text-slate-700 text-lg font-bold">Trading Session: @if(auth()->user()->is_paused)
                        {{ 'ACCOUNT SUSPENDED' }}
                     @else
                        @switch(auth()->user()->status)
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
                         @endswitch
                     @endif</h4>
                    <p class="text-slate-500 text-base font-bold">NB: You cannot initiate funds withdrawal during an active trading session.</p>                                                    
            </div>   
            {{-- withdrawal form --}}   
            <div class="md:grid md:grid-cols-2 gap-6 pb-20"> 
                {{-- LIVEWIRE STARTS --}}
                @livewire('user.make-fiat-withdrawal')
                {{-- LIVEWIRE ENDS --}}
                <div class="col-span-2 md:col-span-1">
                    <span class="flex flex-nowrap justify-center item-center text-dark text-2xl capitalize mx-auto mt-20 mb-4 md:mt-[-14px] md:w-1/2 ">Use Real-Time Converter</span>
                    <div class="flex flex-nowrap justify-center item-center">               
                         <!-- Crypto Converter ⚡ Widget -->
                        <crypto-converter-widget 
                        shadow 
                        symbol 
                        live 
                        background-color="#383a59" 
                        border-radius="0.60rem" 
                        fiat="united-states-dollar"
                        crypto="bitcoin"
                        amount="1" 
                        decimal-places="2"
                        ></crypto-converter-widget>                
                        
                        <!-- /Crypto Converter ⚡ Widget -->
                    </div>
                </div>
            </div>
            {{-- withdrawal form ends --}}    
        </div>
    </section>
    </x-app-layout>
    <script>
      /*   window.addEventListener('swalwit', function(e){
            Swal.fire({                
                icon: e.detail.icon,
                title: e.detail.title,
                html: e.detail.html,                
            });
        }) */

        Livewire.on('swalwit',(e)=>{
            Swal.fire({                
                icon: 'success',
                title: 'Transaction Successful',
                html: '<p>Withdrawal is been previewed and will be released shortly into your designated Bank Account. <br>Transaction fees may apply.</p>',                
            });
        })
    </script>            