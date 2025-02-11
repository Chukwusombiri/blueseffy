<x-app-layout>
    {{-- hero section --}}
    <section class="relative bg-white dark:bg-gray-800">
        <div class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center px-6 md:px-10 py-16 gap-y-6">
            <div
                class="relative text-center md:text-start md:pr-4 flex flex-col items-center md:items-start gap-3 md:gap-6">
                <h2 class="text-4xl md:text-6xl archivo-700 leading-tight text-gray-700 dark:text-gray-100">
                    Unlock Your Financial Future <br /><span class="text-indigo-600 dark:text-blue-500">{{ config('app.name') }}</span>
                </h2>
                <div class="w-full flex justify-center md:justify-start">
                    <a href="{{ route('user.investments') }}"
                        class="px-6 md:px-8 py-3 md:py-4 flex gap-2 flex-wrap items-center rounded-3xl bg-slate-700 dark:bg-slate-200 text-white dark:text-slate-700 tracking-wide archivo-700 text-xs md:text-sm capitalize transform transition hover:-translate-y-1">get
                        started
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M5 12l14 0"></path>
                            <path d="M15 16l4 -4"></path>
                            <path d="M15 8l4 4"></path>
                        </svg>
                    </a>
                </div>

                <p
                    class="hidden md:block overflow-hidden rounded-full py-1.5 px-2 sm:px-4 text-sm text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Stay informed with the latest updates in the financial
                    markets.
                    <a href="{{ route('articles', ['cat_id' => 'all']) }}" class="font-semibold text-blue-600">
                        Read more <span aria-hidden="true">&rarr;</span>
                    </a>
                </p>
            </div>
            <div class="flex h-auto md:h-96">
                <img src="{{ asset('/images/scraper.jpg') }}" alt="hero image" class="w-full h-full rounded-xl">
            </div>
        </div>
    </section>
    <!-- What do you want to do -->
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto">
            <div class="px-6 mt-12 services-slider owl-carousel owl-theme" data-aos="fade-right">
                <div class="p-8 rounded-lg border border-indigo-600 dark:border-blue-500 shadow-lg">
                    <svg class="text-gray-700 dark:text-gray-200 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Invest Funds</h3>
                    <p class="mb-4 text-gray-700 dark:text-gray-400 text-sm">Invest in Financial market and diversify
                        your portfolio expertly with
                        {{ config('app.name') }} portfolio management.</p>
                    <x-link-button href="{{ route('user.pricing_table') }}"
                        class="shadow uppercase">invest</x-link-button>
                </div>
                <div class="p-8 rounded-lg border border-indigo-600 dark:border-blue-500 shadow-lg">
                    <svg class="text-gray-700 dark:text-gray-200 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M6 6h8a3 3 0 0 1 0 6a3 3 0 0 1 0 6h-8"></path>
                        <path d="M8 6l0 12"></path>
                        <path d="M8 12l6 0"></path>
                        <path d="M9 3l0 3"></path>
                        <path d="M13 3l0 3"></path>
                        <path d="M9 18l0 3"></path>
                        <path d="M13 18l0 3"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Withdraw Cryptocurrencies</h3>
                    <p class="mb-4 text-gray-700 dark:text-gray-400 text-sm">Instantly withdraw your Investments Returns
                        directly into your preferred
                        cryptocurrency wallet with just a few button clicks.</p>
                    <x-link-button href="{{ route('user.withdrawal.create') }}" class="shadow">withdraw</x-link-button>
                </div>
                <div class="p-8 rounded-lg border border-indigo-600 dark:border-blue-500 shadow-lg">
                    <svg class="text-gray-700 dark:text-gray-200 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Fiat Withdrawals</h3>
                    <p class="mb-4 text-gray-700 dark:text-gray-400 text-sm">Withdraw your Investment returns directly
                        into any bank account of your choice without incurring charges.</p>
                    <x-link-button href="{{ route('user.fiat_withdrawal.create') }}"
                        class="shadow">transfer</x-link-button>
                </div>
            </div>
        </div>
    </section>
    {{-- COIN WIDGET --}}
    <div class="bg-white dark:bg-gray-800 py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div class="sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">Invest at the
                    perfect time</h2>
                <p class="mx-auto mt-6 max-w-2xl text-md leading-6 text-gray-600 dark:text-gray-400">Leverage insights
                    from our network of
                    industry insiders, and know when to buy to maximize profit, and when to sell to avoid painful
                    losses.</p>
            </div>

            <div class="mt-20 max-w-lg sm:mx-auto md:max-w-none">
                <div
                    style="height:669px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; 
                    border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; 
                    box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:649px; padding:0px; margin:0px; width: 100%;">
                        <iframe
                            src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=10&pref_coin_id=1505&graph=yes"
                            width="100%" height="645px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== features Section Start -->
    <section class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto mb-10 max-w-[510px] text-center">
                <h2 class="mb-4 text-3xl archivo-700 md:text-4xl text-gray-700 dark:text-gray-200">
                    Now is the time to build your portfolio. <span class="text-indigo-600 dark:text-blue-500">Not later.</span>
                </h2>
                <p class="text-md text-gray-600 dark:text-gray-400 archivo-500">
                    With typical markets returns, you have to start early to secure your future. With
                    {{ config('app.name') }},
                    it's never too late to start.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                        <path
                            d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z" />
                        <path fill-rule="evenodd"
                            d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z" />
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Invest any amount
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        Whether its $100 or $1,000,000, we can put your money to good use and make it work for you.
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                        <path
                            d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Trade in Real-Time
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        Get insider tips on big market moves and act on them within seconds. We can make those decisions
                        for you.
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path
                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Build a balanced portfolio
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        We spread investors assets across different industries to find the most opportunities to win
                        huge.
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Portfolio Tracking
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        Watch your investments grow exponentially leaving other investors in dust. Get daily tips on
                        next actions.
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-bezier" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                        <path
                            d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z" />
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Profit from your network
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        Invite new insiders to get tips faster and beat other BLUESTECH members. Invite friends for more
                        extra gains.
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 md:p-10 shadow-md border border-gray-300 dark:border-gray-500">
                    <svg class="text-indigo-600 dark:text-blue-500 w-8 h-8 mb-1" xmlns="http://www.w3.org/2000/svg" width="150"
                        height="150" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                        <path
                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"
                            fill="currentColor"></path>
                        <path
                            d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"
                            fill="currentColor"></path>
                    </svg>
                    <h4 class="mb-2 text-xl archivo-700 text-gray-700 dark:text-gray-100">
                        Encrypted and secured
                    </h4>
                    <p class="text-sm tracking-wide text-gray-600 dark:text-gray-400">
                        Cutting-edge security technology employed, that ensures your anonymity and even the NSA don't
                        know about.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- ai trader --}}
    <section class="overflow-hidden bg-white dark:bg-gray-800 py-12 md:py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div
                class="mx-auto max-w-2xl grid grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base font-semibold leading-6 text-indigo-600 dark:text-blue-500">Grow exponentially</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-200 sm:text-4xl">A.I Powered Trader
                        </p>
                        <p class="mt-6 text-md text-gray-600 dark:text-gray-400">Want to earn more on your current trading plan?
                            Artemis-Algorithm: our A.I Powered Trader tool boost your hourly earning rate by
                            up to 5x its current rate. No prior experience is required.
                        </p>
                        <div class="mt-10 max-w-xl space-y-8 text-sm tracking-wide text-gray-600 dark:text-gray-400 lg:max-w-none">
                            <div class="relative pl-9">
                                <div class="inline font-semibold text-gray-700 dark:text-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-focus-auto absolute left-1 top-1 h-6 w-6 text-indigo-600 dark:text-blue-500"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                        <path d="M10 15v-4a2 2 0 1 1 4 0v4" />
                                        <path d="M10 13h4" />
                                    </svg>Proven Performance
                                </div>
                                <div class="inline">Backed by rigorous testing and real-world results, Artemis-Algorithm
                                    has consistently delivered impressive returns.
                                </div>
                            </div>
                            <div class="relative pl-9">
                                <div class="inline font-semibold text-gray-700 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-adjustments-alt absolute left-1 top-1 h-6 w-6 text-indigo-600 dark:text-blue-500"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 8h4v4h-4z" />
                                        <path d="M6 4l0 4" />
                                        <path d="M6 12l0 8" />
                                        <path d="M10 14h4v4h-4z" />
                                        <path d="M12 4l0 10" />
                                        <path d="M12 18l0 2" />
                                        <path d="M16 5h4v4h-4z" />
                                        <path d="M18 4l0 1" />
                                        <path d="M18 9l0 11" />
                                    </svg>
                                    Automated Trading
                                </div>
                                <div class="inline">Artemis-Algorithm offers the ultimate convenience of automated
                                    trading, execute trades on your behalf with precision and speed</div>
                            </div>
                            <div class="relative pl-9">
                                <div class="inline font-semibold text-gray-700 dark:text-gray-100"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-minimize absolute left-1 top-1 h-6 w-6 text-indigo-600 dark:text-blue-500"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 9l4 0l0 -4" />
                                        <path d="M3 3l6 6" />
                                        <path d="M5 15l4 0l0 4" />
                                        <path d="M3 21l6 -6" />
                                        <path d="M19 9l-4 0l0 -4" />
                                        <path d="M15 9l6 -6" />
                                        <path d="M19 15l-4 0l0 4" />
                                        <path d="M15 15l6 6" />
                                    </svg>Passive Income </div>
                                <div class="inline">With Artemis-Algorithm, generating passive income becomes effortless
                                    - continuously scanning the markets for lucrative opportunities
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a href="{{ route('artemis') . '#plans' }}"
                            class="rounded-md bg-indigo-600 dark:bg-blue-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            Artemis-Algorithm</a>
                        <a href="{{ route('artemis') }}"
                            class="text-md font-semibold leading-6 text-indigo-600 dark:text-blue-500 hover:underline tracking-wide">
                            Learn more &#10511;
                        </a>
                    </div>
                </div>
                <img src="{{ url('images/bot.jpg') }}" alt="Product screenshot"
                    class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0"
                    width="2432" height="1442">
            </div>
        </div>
    </section>
    {{-- MOBILE APP --}}
    <section class="bg-cover bg-center" style="background-image: url('/images/investment.jpg')">
        <div class="bg-gray-900 bg-opacity-60 backdrop-blur-sm text-white py-16 text-center px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold">Ready to dive in?</h2>
                <p class="mt-4 mb-8 text-lg">Join {{ config('app.name') }} and empower yourself to shape a secure
                    financial
                    future..</p>
                <x-link-button href="/register">Sign Up Now</x-link-button>
                <div class="text-white py-16">
                    <div class="container mx-auto flex flex-col items-center justify-center">
                        <h2 class="text-4xl font-bold mb-6">Get the Mobile App Now</h2>
                        <div class="flex space-x-4">
                            <button onclick='Livewire.emit("openModal","app-store")'
                                class="flex items-center cursor-pointer px-4 py-2 bg-white dark:bg-gray-800 shadow border border-indigo-600 dark:border-blue-500 rounded-full font-semibold text-xs text-indigo-600 dark:text-blue-500 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-300 dark:hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900 shadow focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="stroke-indigo-600 dark:stroke-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M8 16l1.106 -1.99m1.4 -2.522l2.494 -4.488"></path>
                                    <path d="M7 14h5m2.9 0h2.1"></path>
                                    <path d="M16 16l-2.51 -4.518m-1.487 -2.677l-1 -1.805"></path>
                                  </svg>
                                <span class="font-semibold">Apple Store</span>
                            </button>
                            <button onclick='Livewire.emit("openModal","app-store")'
                                class="flex items-center cursor-pointer px-4 py-2 bg-white dark:bg-gray-800 shadow border border-indigo-600 dark:border-blue-500 rounded-full font-semibold text-xs text-indigo-600 dark:text-blue-500 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-300 dark:hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900 shadow focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="stroke-indigo-600 dark:stroke-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M4 3.71v16.58a.7 .7 0 0 0 1.05 .606l14.622 -8.42a.55 .55 0 0 0 0 -.953l-14.622 -8.419a.7 .7 0 0 0 -1.05 .607z"></path>
                                    <path d="M15 9l-10.5 11.5"></path>
                                    <path d="M4.5 3.5l10.5 11.5"></path>
                                  </svg>
                                <span class="font-semibold">Google Play</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- testimonials --}}
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-3xl text-center font-bold mb-8 md:text-4xl text-gray-700 dark:text-gray-200">Client Reviews</h2>
            <p class="text-center mb-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-400">Explore the testimonials and success stories of our clients
                who have experienced the exceptional Account Management service provided by {{ config('app.name') }}. <a href="{{ route('testimonials') }}"
                class="text-blue-600 dark:text-blue-500 hover:underline">Go to Testimonials</a>
            </p>
            <div class="testimonial-slider mt-10 owl-carousel owl-theme">
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-700 dark:text-gray-300 tracking-wide">"For more than a year, I have been a loyal
                        user of
                        {{ config('app.name') }}'s Account Management service, and I must say, I am highly content with
                        the outcomes. The team's exceptional expertise and unwavering dedication have played a pivotal
                        role in driving consistent growth within my investment portfolio."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-1.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-800 dark:text-gray-100"><strong>John Larsson</strong></p>
                            <p class="text-gray-500 dark:text-gray-400">Investor</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-700 dark:text-gray-300 tracking-wide">"The Account Management service offered by
                        {{ config('app.name') }} has truly surpassed my expectations. Their customized investment
                        strategies and open communication have instilled a strong sense of confidence in my financial
                        future."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-2.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-800 dark:text-gray-100"><strong>Ricky Garcia</strong></p>
                            <p class="text-gray-500 dark:text-gray-400">Investor</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-700 dark:text-gray-300 tracking-wide">"I am thoroughly impressed with
                        {{ config('app.name') }}'s Account Management service, which has surpassed all my expectations.
                        Their exceptional communication and customized strategies have not only provided transparency
                        but also resulted in substantial returns on my investments."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-3.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-800 dark:text-gray-100"><strong>Jennifer Thompson</strong></p>
                            <p class="text-gray-500 dark:text-gray-400">Investor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-coin-vendors />
    {{-- FOOTER --}}
    <x-footer></x-footer>
</x-app-layout>
