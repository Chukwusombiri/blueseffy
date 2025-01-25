<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 ACCOUNT FUNDING
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Portfolio funding through crytocrrency deposit
                 Last Login: {{$user->last_sign_in_at}}<br>
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
    <section class="relative overflow-hidden pt-20 pb-20 lg:pt-[120px] lg:pb-[90px]">
        @livewire('user.make-deposit', ['wallets'=>$wallets], key($user->id))
    </section>
</x-app-layout>

 <script>
  window.addEventListener('swal', function(e){
    Swal.fire({
    icon: e.detail.icon,
    title: e.detail.title,
    html: e.detail.html,
});
  })    
</script>   
