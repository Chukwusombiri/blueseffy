<x-app-layout>
    <x-user-header title="Fiat withdrawals" titleDesc="Account Fiat withdrawal records. Create new fiat withdrawal" />
    <!-- Breadcrumb End -->
    <section class="relative pt-14 pb-20 bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-between flex-wrap gap-4 items-center mb-10">
                <div class="flex flex-col gap-1">
                    <h2 class="text-gray-800 dark:text-gray-200 text-xl capitalize font-semibold">Fiat withdrawal
                        records</h2>
                    <a href="#fiat-withdrawal-how-to"
                        class="text-sm text-blue-500 dark:text-blue-600 tracking-wide underline">How to create a fiat
                        withdrawal</p>
                </div>
                <a href="{{ route('user.fiat_withdrawal.create') }}"
                    class="font-bold bg-indigo-600 dark:bg-blue-500 hover:bg-indigo-800 dark:hover:bg-blue-800 text-white px-6 py-3 rounded-xl text-xs uppercase">Withdrawal
                    to bank</a>
            </div>
            @livewire('user.fiat-withdrawal-list')
        </div>
    </section>
    <section id="fiat-withdrawal-how-to" class="bg-gray-50 dark:bg-gray-900 pt-14 pb-20 lg:pb-32">
        <div class="max-w-xl mx-auto px-6">
            <h2 class="text-gray-800 dark:text-gray-200 text-2xl font-semibold mb-6 capitalize">Steps to withdraw fiat
            </h2>
            <ul role="list" class="space-y-3 text-gray-600 dark:text-gray-400 mb-4 text-md">
                <li class="flex items-center gap-2">
                    <svg class="text-indigo-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Click 'make withdrawals'.
                </li>
                <li class="flex items-center gap-2">
                    <svg class="text-indigo-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Enter your intended amount (less or equal to R.O.I)
                </li>
                <li class="flex items-center gap-2">
                    <svg class="text-indigo-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Enter your bank details
                </li>
                <li class="flex items-center gap-2">
                    <svg class="text-indigo-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Request OTP and validate your withdrawal
                </li>
            </ul>            
            <div class="flex items-center mt-4">
                <a href="{{ route('user.fiat_withdrawal.create') }}"
                    class="inline-flex border border-indigo-600 dark:border-blue-500 hover:border-2 text-gray-800 dark:text-gray-100 px-6 py-2 md:px-8 md:py-3 rounded-xl">
                    <span class="mr-2 capitalize">make withdrawal</span>
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
