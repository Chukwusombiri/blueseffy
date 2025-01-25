<x-app-layout>
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Crytocurrency wallets
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 View, add, edit and delete crytocurrency wallet
                 Last Login: {{auth()->user()->last_sign_in_at}}
              </p>
           </div>
        </div>
     </section> 
    <section class="relative overflow-hidden pt-20 pb-40 lg:pt-[120px] lg:pb-[90px]">
        @livewire('user.wallet-list')
    </section> 
</x-app-layout>
<script>
    Livewire.on('deletedUserWallet',(e)=>{
        toastr.success('wallet deleted')
    })
</script>