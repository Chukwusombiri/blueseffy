<x-app-layout>
<section class="shadow-md py-[70px]" id="mypage-header">
    <div class="mx-auto px-4 sm:container">
       <div class="border-stroke border-b stats-link">
          <h2 class="mb-2 text-2xl font-semibold text-white">
             FUNDS WITHDRAWAL
          </h2>
          <p class="text-white mb-6 text-sm font-medium">
             Withdraw funds through crytocrrency
             Last Login: {{$user->last_sign_in_at}}
          </p>
       </div>
    </div>
 </section>
<section class="relative overflow-hidden pt-20 pb-20 lg:pt-[120px] lg:pb-[90px]">
    @livewire('user.make-withdrawal', [           
            'userwallets'=>$userwallets,
            'acROI'=>$acROI,
            'acBal'=>$acBal,
            'user'=>$user
            ], key($user->id))
</section>
</x-app-layout>
<script>
    window.addEventListener('swalwit', function(e){
        Swal.fire({                
            icon: e.detail.icon,
            title: e.detail.title,
            html: e.detail.html,                
        });
    })
</script>    

