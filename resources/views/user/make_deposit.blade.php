<x-app-layout>
    <x-user-header title="ACCOUNT FUNDING" titleDesc="Deposit assets into your account for future purposes" />
    <section class="relative py-20">
        @livewire('user.make-deposit', ['wallets'=>$wallets], key($user->id))
    </section>
     <x-coin-vendors />
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
