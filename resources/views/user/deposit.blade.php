<x-app-layout>
    <x-user-header title="Deposit History" titleDesc="Funds Deposits and records. Create new account funding request."/>    
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mb-10 flex flex-wrap justify-between items-center">
                <div class="flex flex-col">
                    <h2 class="text-gray-800 dark:text-gray-100 uppercase font-bold text-xl mb-1">
                        Your Deposits
                    </h2>                    
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Learn how to make your first deposit. <a href="#deposit-how-to"
                            class="text-blue-600 dark:text-blue-500 underline">Read how-to</a>
                    </p>
                </div>
                <a href="{{route('user.deposit.create')}}"
                    class="font-bold bg-indigo-600 dark:bg-blue-500 hover:bg-indigo-800 dark:hover:bg-blue-800 text-white px-6 py-3 rounded-xl text-xs uppercase">Deposit asset</a>
            </div>
            @livewire('user.deposit-list')
        </div>        
    </section>
    <section id="deposit-how-to" class="bg-white dark:bg-gray-900 pt-16 pb-20 lg:pb-28">
        <div class="max-w-xl mx-auto px-6 md:px-8">
            <p class="text-gray-800 dark:text-gray-200 text-2xl font-semibold mb-6 capitalize">Deposit Funds into your Account with these steps</p>
            <ul role="list" class="space-y-3 text-gray-600 dark:text-gray-400 mb-4 text-md">
                <li class="flex items-center gap-2"><svg class="text-indigo-600 dark:text-blue-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> click the 'make a deposit' button.</li>
                <li class="flex items-center gap-2"><svg class="text-indigo-600 dark:text-blue-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Enter your intended amount of Funds</li>
                <li class="flex items-center gap-2"><svg class="text-indigo-600 dark:text-blue-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Select your preferred payment cryptocurrency</li>
                <li class="flex items-center gap-2"><svg class="text-indigo-600 dark:text-blue-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Submit your deposit. You are all set!</li>               
            </ul>
            <p class="text-gray-600 dark:text-gray-400 text-sm">For security protocols, sometimes you may be prompted to
                confirm your password.</p>
            <div class="flex items-center mt-4">
                <a href="{{route('user.deposit.create')}}"
                    class="inline-flex border border-indigo-600 dark:border-blue-500 hover:border-2 text-gray-800 dark:text-gray-100 px-6 py-2 md:px-8 md:py-3 rounded-xl">
                    <span class="mr-2">Make a deposit</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
<script>
    Livewire.on('uploadedReceipt',(e) => {
      toastr.success('Upload successful')
    })
</script>