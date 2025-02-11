<x-app-layout>
<section class="relative pt-14 pb-20">
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

