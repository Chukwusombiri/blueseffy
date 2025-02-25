<x-app-layout>
    <x-user-header title="Crytocurrency wallets" titleDesc="manage your withdrawal wallets" />
    <section class="relative bg-white dark:bg-gray-800 pt-14 pb-20 lg:pb-28">
        @livewire('user.wallet-list')
    </section>     
</x-app-layout>
<script>
    Livewire.on('deletedUserWallet',(e)=>{
        toastr.success('wallet deleted')
    })
</script>