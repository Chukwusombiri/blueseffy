<x-app-layout>
    <section class="relative bg-white">
        <div class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center px-6 md:px-10 py-16 gap-y-6">
            <div
                class="relative text-center md:text-start md:pr-4 flex flex-col items-center md:items-start gap-3 md:gap-6">
                <h2 class="text-4xl md:text-6xl archivo-700 leading-tight text-gray-700">
                    Unlock Your Financial Future <br /><span class="text-indigo-600">{{ config('app.name') }}</span>
                </h2>                
                <div class="w-full flex justify-center md:justify-start">
                    <a href="{{ route('user.investments') }}"
                        class="px-6 md:px-8 py-3 md:py-4 rounded-xl bg-slate-700 text-white tracking-wide archivo-700 text-xs md:text-sm capitalize transition hover:-translate-y">get
                        started</a>
                </div>

                <p
                    class="hidden md:block overflow-hidden rounded-full py-1.5 px-2 sm:px-4 text-sm text-slate-600 bg-slate-200 leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
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
    <section class="bg-gray-200 py-20">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center" data-aos="fade-up">What do you want do? </h2>
            <div class="px-6 mt-12 services-slider owl-carousel owl-theme" data-aos="fade-right">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <span class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Invest Funds</h3>
                    <p class="mb-6 text-gray-700">Invest in Financial market and diversify your portfolio expertly with
                        {{ config('app.name') }} portfolio management.</p>
                    <x-link-button href="{{ route('user.pricing_table') }}"
                        class="shadow uppercase">invest</x-link-button>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <span>
                        <svg fill="#000000" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="m19.828 6.612-5.52-5.535a3.135 3.135 0 0 0-4.5 0L4.273 6.612l7.755 3.87zm2.118 2.235 1.095 1.095a3.12 3.12 0 0 1 0 4.5L14.22 23.35a2.685 2.685 0 0 1-.72.525V13.077zm-19.893 0L.958 9.942a3.12 3.12 0 0 0 0 4.5L9.78 23.35c.21.214.453.392.72.525V13.077z">
                                </path>
                            </g>
                        </svg>
                    </span>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Withdraw Cryptocurrencies</h3>
                    <p class="mb-6 text-gray-700">Withdraw your Return on Investments directly into your preferred
                        cryptocurrency wallet.</p>
                    <x-link-button href="{{ route('user.withdrawal.create') }}" class="shadow">withdraw</x-link-button>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Transfer Fiat currency</h3>
                    <p class="mb-6 text-gray-700">Transfer or withdraw your ROI into any fiat currency and withdraw into
                        your bank account.</p>
                    <x-link-button href="{{ route('user.fiat_withdrawal.create') }}"
                        class="shadow">transfer</x-link-button>
                </div>
            </div>
        </div>
    </section>
    {{-- COIN WIDGET --}}
    <div class="bg-white py-24 sm:py-32 lg:py-40">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div class="sm:text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Invest at the perfect time
                </p>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600">Leverage insights from our network of
                    industry insiders, and know when to buy to maximize profit, and when to sell to avoid painful
                    losses.</p>
            </div>

            <div class="mt-20 max-w-lg sm:mx-auto md:max-w-none">
                <div
                    style="height:669px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; 
            border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; 
            box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:649px; padding:0px; margin:0px; 
            width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=10&pref_coin_id=1505&graph=yes"
                            width="100%" height="645px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== features Section Start -->
    <section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto mb-12 max-w-[510px] text-center lg:mb-20">
                <h2 class="mb-4 text-3xl archivo-700 md:text-4xl">
                    Now is the time to build your portfolio. <span class="text-indigo-600">Not later.</span>
                </h2>
                <p class="text-md text-gray-600 archivo-500">
                    With typical markets returns, you have to start early to secure your future. With BLUESTECH,
                    it's never too late to start.
                </p>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                <path
                                    d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z" />
                                <path fill-rule="evenodd"
                                    d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z" />
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">
                            Invest any amount
                        </h4>
                        <p class="text-sm tracking-wide">
                            Whether its $100 or $1,000,000, we can put your money to good use and make it work for you.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path
                                    d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">
                            Trade in Real-Time
                        </h4>
                        <p class="text-sm tracking-wide">
                            Get insider tips on big market moves and act on them within seconds. We can make those
                            decisions for you.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">Build a balanced portfolio</h4>
                        <p class="text-sm tracking-wide">
                            We spread investors assets across different industries to find the most opportunities to win
                            huge.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">Portfolio Tracking</h4>
                        <p class="text-sm tracking-wide">
                            Watch your investments grow exponentially leaving other investors in dust. Get daily tips on
                            next actions.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-bezier" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                <path
                                    d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z" />
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">
                            Profit from your network
                        </h4>
                        <p class="text-sm tracking-wide">
                            Invite new insiders to get tips faster and beat other BLUESTECH members. Invite friends for
                            more extra gains.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-8 rounded-xl bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                        <div class="mb-4">
                            <svg class="text-indigo-600 w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="150"
                                height="150" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                <path
                                    d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"
                                    fill="#6875f5"></path>
                                <path
                                    d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"
                                    fill="#6875f5"></path>
                            </svg>
                        </div>
                        <h4 class="mb-3 text-xl archivo-700 text-gray-700">Encrypted and secured</h4>
                        <p class="text-sm tracking-wide">
                            Cutting-edge security technology employed, that ensures your anonymity and even the NSA
                            don't know about.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ai trader --}}
    <section class="overflow-hidden bg-white py-8 sm:py-16">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600">Grow exponentially</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">A.I Powered Trader
                        </p>
                        <p class="mt-6 text-md text-gray-600">Want to earn more on your current trading plan?
                            Artemis-Algorithm: our A.I Powered Trader tool boost your hourly earning rate by
                            up to 5x its current rate. No prior experience is required.
                        </p>
                        <dl class="mt-10 max-w-xl space-y-8 text-sm tracking-wide text-gray-600 lg:max-w-none">
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-focus-auto absolute left-1 top-1 h-6 w-6 text-indigo-600"
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
                                </dt>
                                <dd class="inline">Backed by rigorous testing and real-world results, Artemis-Algorithm
                                    has consistently delivered impressive returns.
                                </dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-adjustments-alt absolute left-1 top-1 h-6 w-6 text-indigo-600"
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
                                </dt>
                                <dd class="inline">Artemis-Algorithm offers the ultimate convenience of automated
                                    trading, execute trades on your behalf with precision and speed</dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-minimize absolute left-1 top-1 h-6 w-6 text-indigo-600"
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
                                    </svg>Passive Income </dt>
                                <dd class="inline">With Artemis-Algorithm, generating passive income becomes effortless
                                    - continuously scanning the markets for lucrative opportunities
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a href="{{ route('artemis') . '#plans' }}"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            Artemis-Algorithm</a>
                        <a href="{{ route('artemis') }}"
                            class="text-sm font-semibold leading-6 text-gray-700 hover:underline">
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
        <div class="bg-gray-900 bg-opacity-60 text-white py-16 text-center px-6">
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
                                class="flex items-center cursor-pointer px-4 py-2 bg-indigo-50 border border-transparent rounded-full font-semibold text-xs text-indigo-800 uppercase tracking-widest hover:bg-indigo-100 focus:bg-indigo-100 active:bg-indigo-300 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg fill="#000000" viewBox="0 0 24 24" id="app-store" data-name="Flat Line"
                                    xmlns="http://www.w3.org/2000/svg" class="icon flat-line w-6 h-6 mr-1">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <line id="primary" x1="21" y1="17" x2="18"
                                            y2="17"
                                            style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                        <line id="primary-2" data-name="primary" x1="20" y1="21"
                                            x2="14.29" y2="10.72"
                                            style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                        <line id="primary-3" data-name="primary" x1="12" y1="6.6"
                                            x2="10" y2="3"
                                            style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                        <line id="primary-4" data-name="primary" x1="14" y1="3"
                                            x2="4" y2="21"
                                            style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                        <line id="primary-5" data-name="primary" x1="13" y1="17"
                                            x2="3" y2="17"
                                            style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                    </g>
                                </svg>
                                <span class="font-semibold">Download on the App Store</span>
                            </button>
                            <button onclick='Livewire.emit("openModal","app-store")'
                                class="flex items-center cursor-pointer px-4 py-2 bg-indigo-50 border border-transparent rounded-full font-semibold text-xs text-indigo-800 uppercase tracking-widest hover:bg-indigo-100 focus:bg-indigo-100 active:bg-indigo-300 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg viewBox="0 0 48 48" id="a" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000" class="w-6 h-6 mr-1">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .b {
                                                    fill: none;
                                                    stroke: #000000;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                }
                                            </style>
                                        </defs>
                                        <path class="b"
                                            d="m25.0274,24.0519l-16.2624,15.8333h0c.5191,1.765,2.1803,3.1148,4.153,3.1148.8306,0,1.5574-.2077,2.1803-.6229h0l18.1694-10.2787-8.2403-8.0464Z">
                                        </path>
                                        <path class="b"
                                            d="m40.9508,20.2623h0l-7.7869-4.4645-8.1365,8.2541,8.2403,8.0464,7.7869-4.3607c1.3497-.7268,2.2842-2.1803,2.2842-3.7377-.1038-1.5574-1.0383-3.0109-2.388-3.7377Z">
                                        </path>
                                        <path class="b"
                                            d="m8.765,8.1148c-.1038.3115-.1038.7268-.1038,1.1421v29.5902c0,.4153,0,.7268.1038,1.1421l16.2624-15.9372L8.765,8.1148Z">
                                        </path>
                                        <path class="b"
                                            d="m25.0274,24.0519l8.1365-8.2541L15.2022,5.623c-.623-.4153-1.4536-.623-2.2842-.623-1.9727,0-3.7377,1.3497-4.153,3.1148h0l16.2624,15.9372Z">
                                        </path>
                                    </g>
                                </svg>
                                <span class="font-semibold">Get it on Google Play</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- testimonials --}}
    <section class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-3xl text-center font-bold mb-8">Client Reviews</h2>
            <p class="text-center mb-4 max-w-2xl mx-auto">Explore the testimonials and success stories of our clients
                who have experienced the exceptional Account Management service provided by {{ config('app.name') }}.
            </p>
            <p class="text-center mb-4 max-w-2xl mx-auto">
                Visit our <a href="{{ route('testimonials') }}"
                    class="text-blue-600 hover:underline">Testimonials</a> page to see what they have to say.
            </p>
            <div class="testimonial-slider mt-12 owl-carousel owl-theme">
                <div class="bg-gray-100 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-900 tracking-wide">"For more than a year, I have been a loyal
                        user of
                        {{ config('app.name') }}'s Account Management service, and I must say, I am highly content with
                        the outcomes. The team's exceptional expertise and unwavering dedication have played a pivotal
                        role in driving consistent growth within my investment portfolio."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-1.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-900"><strong>John Larsson</strong></p>
                            <p class="text-gray-500">Investor</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-900 tracking-wide">"The Account Management service offered by
                        {{ config('app.name') }} has truly surpassed my expectations. Their customized investment
                        strategies and open communication have instilled a strong sense of confidence in my financial
                        future."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-2.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-900"><strong>Ricky Garcia</strong></p>
                            <p class="text-gray-500">Investor</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow p-6">
                    <blockquote class="text-sm text-gray-900 tracking-wide">"I am thoroughly impressed with
                        {{ config('app.name') }}'s Account Management service, which has surpassed all my expectations.
                        Their exceptional communication and customized strategies have not only provided transparency
                        but also resulted in substantial returns on my investments."</blockquote>

                    <div class="flex justify-start items-start mt-4">
                        <div class="w-1/4 mr-2">
                            <img src="{{ url('images/p-3.jpg') }}" alt="" class="h-20 w-20 rounded-full">
                        </div>
                        <div>
                            <p class="mt-4 text-gray-900"><strong>Jennifer Thompson</strong></p>
                            <p class="text-gray-500">Investor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- supported coin vendors --}}
    <section class="bg-gray-100 py-12 px-6 md:px-10">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-semibold mb-6 text-center">Our Trusted Partners</h2>
            <p class="max-w-xl mx-auto text-center text-sm mb-4">Do you want to purchase crypto to kick start your
                investment on
                {{ config('app.name') }}? All of our trusted partners makes that purchase and resale of crypto a cinch!
            </p>
            <div class="partners-slider owl-carousel owl-theme">
                <div class="">
                    <a href="https://www.binance.com/" target="_blank"
                        class="p-2 flex flex-col items-center">
                        <span class="text-gray-400"><svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                fill="#000000" class="w-14 h-14">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style>
                                        .st1 {
                                            fill: #fff
                                        }
                                    </style>
                                    <g id="Icon">
                                        <circle cx="512" cy="512" r="512" style="fill:#ffff3ba2f">
                                        </circle>
                                        <path class="st1"
                                            d="M404.9 468 512 360.9l107.1 107.2 62.3-62.3L512 236.3 342.6 405.7z">
                                        </path>
                                        <path transform="rotate(-45.001 298.629 511.998)" class="st1"
                                            d="M254.6 467.9h88.1V556h-88.1z"></path>
                                        <path class="st1"
                                            d="M404.9 556 512 663.1l107.1-107.2 62.4 62.3h-.1L512 787.7 342.6 618.3l-.1-.1z">
                                        </path>
                                        <path transform="rotate(-45.001 725.364 512.032)" class="st1"
                                            d="M681.3 468h88.1v88.1h-88.1z"></path>
                                        <path class="st1"
                                            d="M575.2 512 512 448.7l-46.7 46.8-5.4 5.3-11.1 11.1-.1.1.1.1 63.2 63.2 63.2-63.3z">
                                        </path>
                                    </g>
                                </g>
                            </svg></span>
                        <span class="text-gray-600 tracking-wide mt-2 inline-block">BINANCE</span>
                    </a>
                </div>
                <div class="">
                    <a href="https://www.luno.com/" target="_blank"
                        class="p-2 flex flex-col items-center">
                        <span class="text-gray-400"><svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                fill="#000000" class="w-14 h-14">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="512" cy="512" r="512" style="fill:#ooo"></circle>
                                    <path
                                        d="M460.7 446.2c-5.3 0-9.2 4.4-9.2 9.7v67.7c0 23.7-16.9 40.2-41.1 40.2-24.2 0-40.6-16.5-41.1-40.2v-67.7c0-5.3-4.4-9.7-9.2-9.7s-9.2 4.4-9.2 9.7v68.7c0 17.9 5.8 32.9 17.4 43.1 10.2 9.2 24.7 14.5 40.6 15h3.9c15.5-.5 29.5-5.8 39.7-15 11.1-10.2 16.9-25.2 16.9-43.1v-68.7c.5-5.4-3.9-9.7-8.7-9.7zM310.2 562.3h-29c-23.7 0-40.6-16.5-41.1-40.2v-67.7c0-5.3-4.4-9.7-9.2-9.7-4.8 0-9.2 4.4-9.2 9.7v68.7c0 17.9 5.8 32.9 17.4 43.1 10.2 9.2 24.7 14.5 40.6 15h30.5c5.3 0 9.2-4.4 9.2-9.7 0-5.3-4.3-9.2-9.2-9.2zm308.7 15c-5.3 0-9.2-4.4-9.2-9.7v-67.7c0-23.7-16.9-40.2-41.1-40.2S528 476.2 527.5 498v67.7c0 7.3-4.4 11.6-9.2 11.6s-9.2-4.4-9.2-9.7v-68.2c0-17.9 5.8-32.9 17.4-43.1 9.7-9.7 24.2-14.5 40.2-15h4.4c15.5.5 29.5 5.8 39.7 15 11.6 10.6 17.4 25.6 17.4 43.1v68.7c-.1 4.9-4.4 9.2-9.3 9.2zm115.2 4.4c-19.4 0-36.8-7.3-49.4-20.3-12.1-12.6-18.9-29.5-18.9-47.9v-.5c0-18.4 6.8-35.3 18.9-47.9 12.6-13.5 30.5-20.8 49.4-20.8 19.4 0 36.8 7.3 49.4 20.3 12.1 12.6 18.9 29.5 18.9 47.9v.5c0 18.4-6.8 35.3-18.9 47.9-12.6 13.5-30.5 20.8-49.4 20.8zm0-120c-27.6 0-48.9 21.8-48.9 50.8v.5c0 14 4.8 26.6 14 36.3 9.2 9.7 21.8 15 35.3 15 27.6 0 48.9-21.8 48.9-50.8v-.5c0-14-4.8-26.6-14-36.3-9.2-9.7-21.7-15-35.3-15z"
                                        style="fill:#fff"></path>
                                </g>
                            </svg></span>
                        <span class="text-gray-600 tracking-wide mt-2 inline-block">LUNO</span>
                    </a>
                </div>
                <div class="">
                    <a href="https://www.coinbase.com/" target="_blank"
                        class="p-2 flex flex-col items-center">
                        <span class="text-gray-400"><svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                fill="#000000" class="w-14 h-14">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="512" cy="512" r="512" style="fill:#000"></circle>
                                    <path
                                        d="M516.3 361.83c60.28 0 108.1 37.18 126.26 92.47H764C742 336.09 644.47 256 517.27 256 372.82 256 260 365.65 260 512.49S370 768 517.27 768c124.35 0 223.82-80.09 245.84-199.28H642.55c-17.22 55.3-65 93.45-125.32 93.45-83.23 0-141.56-63.89-141.56-149.68.04-86.77 57.43-150.66 140.63-150.66z"
                                        style="fill:#fff"></path>
                                </g>
                            </svg></span>
                        <span class="text-gray-600 tracking-wide mt-2 inline-block">COINBASE</span>
                    </a>
                </div>
                <div class="">
                    <a href="https://www.kraken.com/" target="_blank"
                        class="p-2 flex flex-col items-center">
                        <span class="text-gray-400"><svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                fill="#000000" class="w-14 h-14">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="512" cy="512" r="512" style="fill:#000"></circle>
                                    <path
                                        d="M256.14 584.42c0-9.75.17-19.49-.06-29.24a292.47 292.47 0 0 1 4.07-56.2c5.4-31.14 15.21-60.54 31.25-87.73C318.3 365.58 356.23 332 404 309.49a239.35 239.35 0 0 1 66.67-20.61c12.09-1.84 24.23-3.34 36.54-3.23 52.3.39 101 13.31 145 42.16 43.11 28.29 75.47 65.72 94.91 113.79a276.71 276.71 0 0 1 17.72 70.4c3.29 26.68 3.45 53.47 3 80.32-.28 14.48-.22 29-.45 43.44-.11 6.29-.33 12.59-2 18.77-6.52 24-33.92 34.92-54 21.61-9-5.9-13.42-14.59-15-25a133.05 133.05 0 0 1-1.67-21.05V542.7c0-11.42-3.56-21.56-11.36-30-13.65-14.65-34.59-15.21-49.91-1.67-8.58 7.63-12.48 17.32-13.31 28.46-.33 4.18-.45 8.35-.45 12.53-.06 32.14.06 64.22-.17 96.36-.17 18.21-14 32.14-32.58 33.42a34.46 34.46 0 0 1-36.54-28.57 86.3 86.3 0 0 1-1.11-14.7c0-32.31.06-64.61 0-96.92a40.2 40.2 0 0 0-11.31-28.52c-15.32-16.1-38.38-15.6-53.25.95-7.3 8.08-10.47 17.49-10.47 28.24 0 31.92-.06 63.89 0 95.8 0 8.24-1 16.32-4.4 23.89a33.7 33.7 0 0 1-32.64 20.33c-13.65-.45-25.18-9-30.41-22.73a47 47 0 0 1-3-16.88q.08-46.37-.06-92.74c0-6.85-.28-13.76-2.34-20.39-4.68-15.21-14.82-24.9-30.47-27.46-15.93-2.62-27.74 4.9-36.59 17.71-4.23 6.13-5.63 13-5.63 20.33q0 44 .06 88c0 8.63.17 17.27-1.78 25.79-3.23 14.15-16.82 29.58-37.37 28.07-14.15-1.06-27.74-12.76-31.69-27.74a64.22 64.22 0 0 1-1.94-16.21c.17-18 .17-35.81.11-53.64z"
                                        style="fill:#fff"></path>
                                </g>
                            </svg></span>
                        <span class="text-gray-600 tracking-wide mt-2 inline-block">KRAKEN</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- FOOTER --}}
    <x-footer></x-footer>
</x-app-layout>
