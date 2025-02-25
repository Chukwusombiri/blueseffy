<x-app-layout>
    <x-user-header title="Affiliate Program" titleDesc="Earn more daily through referrals." />
    <section class="bg-white dark:bg-gray-800 pt-14 pb-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-wrap lg:flex-nowrap justify-between mb-6">
                <div class="flex flex-col gap-2 mb-3 sm:mb-0">
                    <h2 class="text-3xl font-semibold tracking-wide text-gray-700 dark:text-gray-300 capitalize">My
                        Affiliate Incomes</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-lg">
                        Quickly learn how to use Affliate Program <a href="#ref-how-to"
                            class="text-blue-500 underline inline-block pb-0.5 tracking-wide">Here</a>
                    </p>
                </div>
                <a href="{{ route('user.downline') }}" class="flex gap-2 items-center text-indigo-600 text-sm tracking-wide dark:text-blue-500 hover:underline">
                    <span class="">All affiliates</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M5 12l14 0"></path>
                        <path d="M15 16l4 -4"></path>
                        <path d="M15 8l4 4"></path>
                      </svg>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left">
                    @php
                        $contentClasses = 'p-2 text-sm text-gray-800 dark:text-gray-200 capitalize';
                        $headerClasses = 'text-xs uppercase text-gray-600 dark:text-gray-400 font-semibold tracking-wide p-2';
                    @endphp
                    <thead>
                        <tr class="border-0 border-b border-gray-200 dark:border-gray-700">
                            <th class="{{$headerClasses}}">#</th>
                            <th class="{{$headerClasses}}">Amount</th>
                            <th class="{{$headerClasses}}">Downline</th>
                            <th class="{{$headerClasses}}">Transacted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($refincomes as $r => $refincome)
                            <tr class="border-0 border-b border-gray-300 dark:border-gray-900 hover:bg-gray-100 dark:hover:bg-gray-900">
                                <td class="{{$contentClasses}}">{{ $r + 1 }}</td>
                                <td class="{{$contentClasses}}">${{ $refincome->amount }}</td>
                                <td class="{{$contentClasses}}">
                                    {{ $refincome->downline->name }}
                                </td>
                                <td class="{{$contentClasses}}">{{ date('M d, Y', strtotime($refincome->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="ref-how-to" class="bg-white dark:bg-gray-800 pt-20 pb-28">
        <div class="w-full max-w-2xl mx-auto px-6">
            <h2 class="text-3xl mb-6 lg:mb-8 font-bold text-gray-700 dark:text-gray-300 tracking-wide text-center">How to start earning affiliate income</h2>
            <p class="text-sm text-gray-800 dark:text-gray-200">
                Invite your family, friends and work colleagues to join by copying your <span class="font-semibold text-gray-900 dark:text-gray-100">referral link</span> and sharing it. For every of your invites that funds their investment portfolio, you'll be rewarded handsomely according to the amount they funded - the higher amount funded, your reward increase.
            </p>
            <div x-data="{
                refLink: {{json_encode(auth()->user()->ref_link)}},
                isClicked: false,
                async copyToClipboard(){                    
                    try {
                        await navigator.clipboard.writeText(this.refLink);
                        this.isClicked = true;
                        setTimeout(() => {
                            this.isClicked = false;
                        }, 2000);
                    } catch (err) {
                        console.error('Failed to copy: ', err);
                    }
                }
            }" class="mt-4 mb-6 rounded-xl px-4 py-2 flex items-center flex-nowrap gap-2 flex-nowrap border-2 border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-400">
            <span x-text="refLink" class="flex-grow truncate"></span>
            <button id="ref-link" x-on:click="copyToClipboard()" class="w-10 shrink-0 flex justify-center">
                <svg x-show="!isClicked" class="size-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z"></path>
                    <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1"></path>
                </svg>
                <svg x-show="isClicked" class="size-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                    <path d="M18.333 6a3.667 3.667 0 0 1 3.667 3.667v8.666a3.667 3.667 0 0 1 -3.667 3.667h-8.666a3.667 3.667 0 0 1 -3.667 -3.667v-8.666a3.667 3.667 0 0 1 3.667 -3.667zm-3.333 -4c1.094 0 1.828 .533 2.374 1.514a1 1 0 1 1 -1.748 .972c-.221 -.398 -.342 -.486 -.626 -.486h-10c-.548 0 -1 .452 -1 1v9.998c0 .32 .154 .618 .407 .805l.1 .065a1 1 0 1 1 -.99 1.738a3 3 0 0 1 -1.517 -2.606v-10c0 -1.652 1.348 -3 3 -3zm1.293 9.293l-3.293 3.292l-1.293 -1.292a1 1 0 0 0 -1.414 1.414l2 2a1 1 0 0 0 1.414 0l4 -4a1 1 0 0 0 -1.414 -1.414"></path>
                </svg>
            </button>
        </div>
        
            <div class="mt-4 space-y-3">
                <h4 class="text-lg text-gray-600 dark:text-gray-200">
                    Follow steps below to invite affilates: 
                </h4>
                <ul role="list" class="space-y-2">
                    @php
                        $list = [
                            'Copy your Affiliate link above or you can also find it in your profile settings.',
                            'Share the link to your family, friends, colleagues etc.',
                            'Return to this page to confirm your Affilaite rewards after your invites have funded their investment portfolio.'
                        ]                       
                    @endphp  
                    
                    @foreach ($list as $item)
                    <li class="flex flex-nowrap gap-2 text-sm text-gray-600 dark:text-gray-400"> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M5 12l5 5l10 -10"></path>
                          </svg>
                        <span class="break-words">{{$item}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>            
        </div>
    </section>
</x-app-layout>