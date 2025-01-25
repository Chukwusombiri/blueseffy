<x-app-layout>
    <section class="bg-cover bg-center" style="background-image: url('/images/page-header.jpg')">
        <div class="bg-gray-900 bg-opacity-60 py-12">
            <div class="max-w-6xl mx-auto px-6 md:px-10">
                <div class="border-stroke border-b mx-auto block md:flex">
                    <div class="mr-4">
                        @if (Auth::user()->profile_photo_path)
                            <img class="h-14 w-14 rounded-full object-cover"
                                src="{{ url('storage/' . Auth::user()->profile_photo_path) }}"
                                alt="{{ Auth::user()->name }}" />
                        @else
                            <img class="h-14 w-14 rounded-full object-cover"
                                src="{{ url('storage/profile-photos/user.png') }}" alt="{{ Auth::user()->name }}" />
                        @endif
                    </div>
                    <div>
                        <h2 class="mt-2 text-2xl font-semibold text-white">
                            @if (auth()->user()->last_sign_out_at === null)
                                Hello! {{ auth()->user()->name }}
                            @else
                                Welcome back {{ auth()->user()->name }}
                            @endif
                        </h2>
                        <p class="text-white text-sm font-medium">
                            Last Login: {{ $user->last_sign_in_at }} <br><br>
                        </p>
                    </div>
                </div>
                <div class="text-gray-100 py-4">
                    <p class="uppercase font-semibold mb-2"> Status: <span
                            class="inline-block py-1 px-2 rounded-full bg-indigo-400">
                            @if ($user->is_paused)
                                {{ 'ACCOUNT SUSPENDED' }}
                            @else
                                @switch($user->status)
                                    @case('earning')
                                        {{ 'ACTIVE TRADING' }}
                                    @break

                                    @case('not_earning')
                                        {{ 'TRADING SESSION COMPLETED' }}
                                    @break

                                    @case('dormant')
                                        {{ 'DORMANT' }}
                                    @break

                                    @case('active')
                                        {{ 'YET TO TRADE' }}
                                    @break
                                @endswitch
                            @endif
                        </span></p>
                    @if ($prevInvestment !== null)
                        <p class="uppercase font-semibold">Last Investment:
                            {{ $prevInvestment->plan->name }}
                        </p>
                        <p class="uppercase font-semibold">Investment Amount:
                            ${{ $prevInvestment->amount }}
                        </p>
                    @elseif($activeInvestment !== null)
                        <p class="uppercase font-semibold">Active Plan:
                            {{ $activeInvestment->plan->name }}
                        </p>

                        <p class="uppercase font-semibold">Active Capital:
                            ${{ auth()->user()->acBal }}
                        </p>
                    @endif
                    @if ($user->percent && $user->percent > 0)
                        <div class="mt-2">
                            <div class="w-full md:w-[80%]">
                                <p class="uppercase font-semibold">Investment Progress: {{ $user->percent }}%</p>
                                <div class="relative h-[20px] bg-gray-100">
                                    <div class="absolute left-0 top-0 h-[100%] px-2"
                                        style="width:{{ $user->percent }}%; background-color:green;"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- INPAGE MENU --}}
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between md:justify-around flex-wrap gap-4">
                <a href="{{ route('user.pricing_table') }}"
                    class="bg-slate-600 text-white text-xs archivo-600 tracking-wide rounded-xl border-2 border-blue-500 px-4 py-2 md:px-8 md:py-3 flex items-center justify-center transition ease-in-out hover:-translate-y-1 duration-300">
                    <span class="uppercase mr-2">Invest asset</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M3 9a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9z"></path>
                        <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </a>
                <a href="{{ route('user.deposit.create') }}"
                    class="bg-slate-600 text-white text-xs archivo-600 tracking-wide rounded-xl border-2 border-blue-500 px-4 py-2 md:px-8 md:py-3 flex items-center justify-center transition ease-in-out hover:-translate-y-1 duration-300">
                    <span class="uppercase mr-2">Deposit asset</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 11l5 5l5 -5"></path>
                        <path d="M12 4l0 12"></path>
                    </svg>
                </a>
                <a href="{{ route('user.withdrawal.create') }}"
                    class="bg-slate-600 text-white text-xs archivo-600 tracking-wide rounded-xl border-2 border-blue-500 px-4 py-2 md:px-8 md:py-3 flex items-center justify-center transition ease-in-out hover:-translate-y-1 duration-300">
                    <span class="uppercase mr-2">Withdraw asset</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M9 12h6"></path>
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                    </svg>
                </a>
                <a href="{{ route('user.fiat_withdrawal.create') }}"
                    class="bg-slate-600 text-white text-xs archivo-600 tracking-wide rounded-xl border-2 border-blue-500 px-4 py-2 md:px-8 md:py-3 flex items-center justify-center transition ease-in-out hover:-translate-y-1 duration-300">
                    <span class="uppercase mr-2">Withdraw fiat</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                        <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!-- ====== Brands Section End -->

    {{-- CARDS --}}
    <div class="max-w-6xl mx-auto px-6 md:px-10 cards">
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $user->totBal }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Total Balance</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                    stroke-width="2">
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    <path d="M3 6m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                    <path d="M18 12l.01 0"></path>
                    <path d="M6 12l.01 0"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $user->acROI }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Return On Investment</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path>
                    <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                    <path d="M5 15v1m0 -8v1"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $user->acBal }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Active Capital</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                    <path d="M12 12l0 .01"></path>
                    <path d="M3 13a20 20 0 0 0 18 0"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $user->doBal }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Dormant Funds</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path
                        d="M11 7h8a2 2 0 0 1 2 2v8m-1.166 2.818a1.993 1.993 0 0 1 -.834 .182h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2">
                    </path>
                    <path d="M8.185 4.158a2 2 0 0 1 1.815 -1.158h4a2 2 0 0 1 2 2v2"></path>
                    <path d="M12 12v.01"></path>
                    <path d="M3 13a20 20 0 0 0 11.905 1.928m3.263 -.763a20 20 0 0 0 2.832 -1.165"></path>
                    <path d="M3 3l18 18"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $lastInvestment ?? '0' }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Last Investment</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                    <path d="M9 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                    <path d="M15 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                    <path d="M4 20h14"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-lg shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $lastDeposit ?? '0' }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Last Deposit</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M12 17v-6"></path>
                    <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                </svg>
            </div>
        </div>

        <div class="card-single rounded-md shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $lastWithdrawal ?? '0' }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Last Withdrawal</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M12 11v6"></path>
                    <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                </svg>
            </div>
        </div>
        <div class="card-single rounded-md shadow-md">
            <div>
                <h1 class="text-xl archivo-700 tracking-wide">${{ $lastFiatWithdrawal ?? '0' }}</h1>
                <span class="text-2xl archivo-800 tracking-wide">Last Fiat Withdraw</span>
            </div>
            <div>
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                    height="24" stroke-width="2">
                    <path d="M9.88 9.878a3 3 0 1 0 4.242 4.243m.58 -3.425a3.012 3.012 0 0 0 -1.412 -1.405"></path>
                    <path
                        d="M10 6h9a2 2 0 0 1 2 2v8c0 .294 -.064 .574 -.178 .825m-2.822 1.175h-13a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h1">
                    </path>
                    <path d="M18 12l.01 0"></path>
                    <path d="M6 12l.01 0"></path>
                    <path d="M3 3l18 18"></path>
                </svg>
            </div>
        </div>

        @if (isset($lastRefIncome) && $lastRefIncome != '')
            <div class="card-single rounded-md shadow-md">
                <div>
                    <h1 class="text-xl archivo-700 tracking-wide">${{ $lastRefIncome }}</h1>
                    <span class="text-2xl archivo-800 tracking-wide">Last Affiliate Bonus</span>
                </div>
                <div>
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                        height="24" stroke-width="2">
                        <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"></path>
                        <path d="M3 10h18"></path>
                        <path d="M7 15h.01"></path>
                        <path d="M11 15h2"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16l-3 3l3 3"></path>
                    </svg>
                </div>
            </div>
        @endif

    </div>

    {{-- MY ASSETS --}}
    <div class="max-w-6xl mx-auto px-6 recent-grid" style="margin-bottom: 100px">
        @if ($user->acBal != '0')
            <div class="investors">
                <div class="card">
                    <div class="card-header">
                        <h2>My Assets</h2>
                    </div>

                    <div class="card-body">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                async>
                                {
                                    "colorTheme": "dark",
                                    "dateRange": "12M",
                                    "showChart": true,
                                    "locale": "en",
                                    "width": "100%",
                                    "height": "500",
                                    "largeChartUrl": "",
                                    "isTransparent": false,
                                    "showSymbolLogo": true,
                                    "showFloatingTooltip": false,
                                    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                    "gridLineColor": "rgba(240, 243, 250, 0)",
                                    "scaleFontColor": "rgba(120, 123, 134, 1)",
                                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                    "tabs": [{
                                            "title": "Indices",
                                            "symbols": [{
                                                    "s": "FOREXCOM:SPXUSD",
                                                    "d": "S&P 500"
                                                },
                                                {
                                                    "s": "FOREXCOM:NSXUSD",
                                                    "d": "US 100"
                                                },
                                                {
                                                    "s": "FOREXCOM:DJI",
                                                    "d": "Dow 30"
                                                },
                                                {
                                                    "s": "INDEX:NKY",
                                                    "d": "Nikkei 225"
                                                },
                                                {
                                                    "s": "INDEX:DEU40",
                                                    "d": "DAX Index"
                                                },
                                                {
                                                    "s": "FOREXCOM:UKXGBP",
                                                    "d": "UK 100"
                                                }
                                            ],
                                            "originalTitle": "Indices"
                                        },
                                        {
                                            "title": "Futures",
                                            "symbols": [{
                                                    "s": "CME_MINI:ES1!",
                                                    "d": "S&P 500"
                                                },
                                                {
                                                    "s": "CME:6E1!",
                                                    "d": "Euro"
                                                },
                                                {
                                                    "s": "COMEX:GC1!",
                                                    "d": "Gold"
                                                },
                                                {
                                                    "s": "NYMEX:CL1!",
                                                    "d": "Crude Oil"
                                                },
                                                {
                                                    "s": "NYMEX:NG1!",
                                                    "d": "Natural Gas"
                                                },
                                                {
                                                    "s": "CBOT:ZC1!",
                                                    "d": "Corn"
                                                }
                                            ],
                                            "originalTitle": "Futures"
                                        },
                                        {
                                            "title": "Forex",
                                            "symbols": [{
                                                    "s": "FX:EURUSD",
                                                    "d": "EUR/USD"
                                                },
                                                {
                                                    "s": "FX:GBPUSD",
                                                    "d": "GBP/USD"
                                                },
                                                {
                                                    "s": "FX:USDJPY",
                                                    "d": "USD/JPY"
                                                },
                                                {
                                                    "s": "FX:USDCHF",
                                                    "d": "USD/CHF"
                                                },
                                                {
                                                    "s": "FX:AUDUSD",
                                                    "d": "AUD/USD"
                                                },
                                                {
                                                    "s": "FX:USDCAD",
                                                    "d": "USD/CAD"
                                                }
                                            ],
                                            "originalTitle": "Forex"
                                        },
                                        {
                                            "title": "Crypto",
                                            "symbols": [{
                                                    "s": "BINANCE:BTCUSDT",
                                                    "d": "Bitcoin"
                                                },
                                                {
                                                    "s": "BINANCE:ETHUSDT",
                                                    "d": "Ethereum - USDT"
                                                },
                                                {
                                                    "s": "BINANCE:BTCUSDTPERP",
                                                    "d": "BTCUSDTPERP"
                                                },
                                                {
                                                    "s": "BINANCE:LTCUSDT",
                                                    "d": "LTCUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:SOLUSDT",
                                                    "d": "SOLUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:ADAUSDT",
                                                    "d": "ADAUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:MATICUSDT",
                                                    "d": "MATICUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:BNBUSDT",
                                                    "d": "BNBUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:SHIBUSDT",
                                                    "d": "SHIBUSDT"
                                                },
                                                {
                                                    "s": "BINANCE:XRPUSDT",
                                                    "d": "XRPUSDT"
                                                }
                                            ]
                                        },
                                        {
                                            "title": "Stocks",
                                            "symbols": [{
                                                    "s": "NASDAQ:AAPL",
                                                    "d": "APPLE INC."
                                                },
                                                {
                                                    "s": "AMEX:SPY",
                                                    "d": "SPDR S&P 500 ETF TRUST"
                                                },
                                                {
                                                    "s": "NASDAQ:TSLA",
                                                    "d": "TESLA, INC."
                                                },
                                                {
                                                    "s": "NSE:RELIANCE",
                                                    "d": "RELIANCE INDS"
                                                },
                                                {
                                                    "s": "NASDAQ:QQQ",
                                                    "d": "INVESCO QQQ TRUST, SERIES 1"
                                                },
                                                {
                                                    "s": "NSE:COALINDIA",
                                                    "d": "COAL INDIA LTD"
                                                },
                                                {
                                                    "s": "NASDAQ:AMZN",
                                                    "d": "AMAZON.COM, INC."
                                                },
                                                {
                                                    "s": "NASDAQ:NVDA",
                                                    "d": "NVIDIA CORPORATION"
                                                },
                                                {
                                                    "s": "NASDAQ:MSFT",
                                                    "d": "MICROSOFT CORPORATION"
                                                }
                                            ]
                                        }
                                    ]
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        @endif
        <div class="transactions">
            <div class="card">
                <div class="card-header">
                    <h2>Recent Transactions</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Ticker</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td>Description</td>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($newtransactions && count($newtransactions) > 0)
                                    @foreach ($newtransactions as $t => $transaction)
                                        <tr>
                                            <td>
                                                @if (isset($transaction->plan_id))
                                                    <span style="color:rgb(47, 227, 167)"
                                                        class="las la-long-arrow-alt-down"></span>
                                                @else
                                                    <span style="color:rgb(255, 84, 84)"
                                                        class="las la-long-arrow-alt-up"></span>
                                                @endif
                                            </td>
                                            <td>${{ $transaction->amount }}</td>
                                            <td>{{ date('M d,y', strtotime($transaction->created_at)) }}</td>
                                            <td>
                                                @if (isset($transaction->plan_id))
                                                    {{ __('Funds Deposit') }}
                                                @else
                                                    {{ __(' Funds Withdrawal') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
