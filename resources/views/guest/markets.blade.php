<x-app-layout>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [{
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "US 100"
                    },
                    {
                        "proName": "FX_IDC:EURUSD",
                        "title": "EUR/USD"
                    },
                    {
                        "proName": "BITSTAMP:BTCUSD",
                        "title": "Bitcoin"
                    },
                    {
                        "proName": "BITSTAMP:ETHUSD",
                        "title": "Ethereum"
                    },
                    {
                        "description": "SOLUSDT",
                        "proName": "BINANCE:SOLUSDT"
                    },
                    {
                        "description": "XRPUSDT",
                        "proName": "BINANCE:XRPUSDT"
                    },
                    {
                        "description": "ETHUSDT",
                        "proName": "BINANCE:ETHUSDT"
                    },
                    {
                        "description": "BTCUSDT",
                        "proName": "BINANCE:BTCUSDT"
                    },
                    {
                        "description": "BTCUSD",
                        "proName": "BITSTAMP:BTCUSD"
                    },
                    {
                        "description": "DOGEUSDT",
                        "proName": "BINANCE:DOGEUSDT"
                    },
                    {
                        "description": "BNBUSDT",
                        "proName": "BINANCE:BNBUSDT"
                    },
                    {
                        "description": "GBPUSD",
                        "proName": "FX:GBPUSD"
                    },
                    {
                        "description": "USDJPY",
                        "proName": "FX:USDJPY"
                    },
                    {
                        "description": "EURUSD",
                        "proName": "FX:EURUSD"
                    }
                ],
                "showSymbolLogo": true,
                "colorTheme": "light",
                "isTransparent": true,
                "displayMode": "regular",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->
    <div class="py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div class="">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-200 md:text-4xl">Markets
                    Overview</p>
                <p class="mt-6 max-w-2xl text-lg leading-6 text-gray-600 dark:text-gray-400">Use our real-time market
                    charts to always be a step ahead. Get insiders tips on big moves and act on them within seconds.</p>
            </div>

            <div class="mt-20 max-w-lg sm:mx-auto md:max-w-none">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_5c2b7" style="height: 500px"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "autosize": true,
                            "symbol": "BINANCE:BTCUSDT",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "dark",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "watchlist": [
                                "BITSTAMP:BTCUSD",
                                "OANDA:XAUUSD",
                                "FX:EURUSD",
                                "BINANCE:ETHUSDT",
                                "FX:GBPUSD",
                                "FX:USDJPY",
                                "AMEX:SPY",
                                "NASDAQ:AAPL",
                                "BINANCE:XRPUSDT",
                                "TVC:GOLD",
                                "NASDAQ:TSLA",
                                "BINANCE:SOLUSDT"
                            ],
                            "calendar": true,
                            "container_id": "tradingview_5c2b7"
                        });
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>

    {{-- Trading view snaps --}}
    <div class="py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <div class="">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-200 md:text-4xl">Daily
                    News</p>
                <p class="mt-6 max-w-2xl text-lg leading-6 text-gray-600 dark:text-gray-400">keep track of recent
                    activities and events in the crypto and stock markets with our daily news update - designed to be
                    read in 20 seconds or less.</p>
            </div>

            <div class="mt-20 w-full flex flex-wrap justify-center items-center gap-7">
                <div class="w-full">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                            {
                                "feedMode": "all_symbols",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "displayMode": "regular",
                                "width": "100%",
                                "height": "600",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    {{-- CTA --}}
    <div class="bg-gray-100 dark:bg-gray-600">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-16 lg:px-8">
            <div class="flex flex-col items-center md:items-start gap-3">
                <h3 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-200 sm:text-4xl">Ready to dive
                    in?</h3>
                <h3 class="text-3xl font-bold tracking-tight sm:text-4xl text-indigo-600 dark:text-blue-500">Sign up for
                    free today.</h3>
            </div>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0 flex justify-center lg:justify-end gap-3">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 dark:bg-blue-500 px-5 py-3 text-base font-medium text-white hover:bg-indigo-700">Get
                    started</a>
                <a href="{{ route('about') }}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-indigo-600 hover:bg-indigo-50 dark:text-blue-500">Learn
                    more</a>
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <x-footer></x-footer>
</x-app-layout>
