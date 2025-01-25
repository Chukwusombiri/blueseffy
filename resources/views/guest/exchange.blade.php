<x-app-layout> 
    <!-- ====== Hero Section Start -->
<div class="relative bg-slate-100 pt-[120px] pb-[110px] lg:pt-[150px]">
    <div class="mycontainer mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4 lg:w-5/12">
          <div class="hero-content">
            <h1
              class="text-dark mb-3 text-4xl font-bold leading-snug sm:text-[42px] lg:text-[40px] xl:text-[42px]"
            >
              Trusted <br />
              Crytocurrency Exchange <br />
              with BLUESTECH.
            </h1>
            <p class="text-body-color mb-8 max-w-[480px] text-base">
             With Bluestech you can swap your cryptos for a higher value return on daily basis or monthly. Coin staking made a lot smoother by Bluestech.
            </p>
            <ul class="flex flex-wrap items-center">
              <li>
                <a
                  href="{{route('user.deposits')}}"
                  class="bg-indigo-600 inline-flex items-center justify-center rounded-lg py-4 px-6 text-center text-base font-normal text-white hover:bg-opacity-90 sm:px-10 lg:px-8 xl:px-10"
                >
                  Get Started
                </a>
              </li>
              <li>
                <a
                  onclick='Livewire.emit("openModal","app-store")'
                  class="text-body-color hover:text-indigo-600 inline-flex items-center justify-center py-4 px-6 text-center text-base font-normal sm:px-10 lg:px-8 xl:px-10"
                >
                  <span class="mr-2">
                    <svg
                      width="22"
                      height="22"
                      viewBox="0 0 22 22"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="11" cy="11" r="11" fill="#3056D3" />
                      <rect
                        x="6.90906"
                        y="13.3636"
                        width="8.18182"
                        height="1.63636"
                        fill="white"
                      />
                      <rect
                        x="10.1818"
                        y="6"
                        width="1.63636"
                        height="4.09091"
                        fill="white"
                      />
                      <path
                        d="M11 12.5454L13.8343 9.47726H8.16576L11 12.5454Z"
                        fill="white"
                      />
                    </svg>
                  </span>
                  Download App
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="hidden px-4 lg:block lg:w-1/12"></div>
        <div class="w-full px-4 lg:w-6/12">
          <div class="lg:ml-auto lg:text-right">
            <div class="relative inline-block pt-11 lg:pt-0">
              <img
                src="{{url('images/investment.jpg')}}"
                alt="hero"
                class="max-w-full lg:ml-auto rounded-lg"
              />
              <span class="absolute -left-8 -bottom-8 z-[-1]">
                <svg
                  width="93"
                  height="93"
                  viewBox="0 0 93 93"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                  <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                  <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                  <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                  <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                  <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                  <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                  <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                  <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                  <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                  <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                  <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                  <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                  <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                  <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                  <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                  <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                  <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                  <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                  <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                  <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                  <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                  <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                  <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                  <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ====== Hero Section End -->
    {{-- COIN WIDGET --}}
    <div class="bg-white py-24 sm:py-32 lg:py-40">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="sm:text-center">
            <h2 class="text-lg font-semibold leading-8 text-indigo-600">Coins</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Popular Crytocurrencies</p>        
          </div>
      
          <div class="mt-10 max-w-lg sm:mx-auto md:max-w-none">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>    
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                {
                "width": "100%",
                "height": "600",
                "defaultColumn": "overview",
                "screener_type": "crypto_mkt",
                "displayCurrency": "USD",
                "colorTheme": "light",
                "locale": "en"
            }
                </script>
            </div>
            <!-- TradingView Widget END -->
          </div>
        </div>
      </div> 

      {{-- BUILD YOUR PORTFOLIO --}}
      <div class="bg-slate-100 pb-24 sm:py-32 lg:py-40">
        <div class="mycontainer max-w-7xl px-6 lg:px-8">              
          <div class="mt-10 max-w-lg sm:mx-auto md:max-w-none">
              <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2 px-4">
                    <div class="sm:text-center pb-4">
                        <h2 class="text-lg font-bold leading-8 text-indigo-600">Build your Portfolio</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Start your first Investment with these easy steps.</p>        
                    </div>
                    <div class="flex flex-wrap justify-center py-7 mt-2">
                        <h2 class="text-dark text-xl font-bold w-full uppercase">Create an account and verify your email</h2>
                        <p class="text-slate-600 text-lg font-normal w-full">Complete the identity verification process to secure your account and transactions</p>
                    </div>
                    <div class="flex flex-wrap justify-center py-7 mt-2">
                        <h2 class="text-dark text-xl font-bold w-full uppercase">Fund your account</h2>
                        <p class="text-slate-600 text-base font-normal w-full">Add funds to your account to start accruing investment returns. You can add funds with a variety of cryptocurrencies.</p>
                    </div>
                    <div class="flex flex-wrap justify-center py-7 mt-2">
                        <h2 class="text-dark text-xl font-bold w-full uppercase">Start Earning</h2>
                        <p class="text-slate-600 text-base font-normal w-full">You're good to go! Deposit and withdraw funds, set up recurring buys for your investments, and discover what BLUESTECH has to offer.</p>
                    </div>
                    <div class="flex flex-wrap justify-start py-2">
                        <a class="inline-flex px-2 py-2 bg-indigo-600 w-max rounded-lg text-white" href="{{route('user.pricing_table')}}">Start now</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-4">
                    <img src="{{url('images/trusted-section.png')}}" alt="Trusted Section" class="w-full h-full">
                </div>
              </div>          
          </div>
        </div>
      </div> 
{{-- NEED HELP --}}
<section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="mycontainer">
      <h2 class="text-indigo-600 text-2xl font-extrabold">Need Help ?</h2>
      <div class="flex flex-wrap justify-center pt-7">
  
          <div class="w-full py-7 md:w-1/3">          
              <p class="text-xl font-bold">24/7 Chat Support</p>
              <p class="text-sm font-light">Get 24/7 chat support with our friendly customer service agents at your service.</p>
              <p><a href="javascript:void(0)" class="text-sm font-light text-indigo-600">Learn more</a></p>          
          </div>
  
          <div class="w-full py-7 md:w-1/3">
              <p class="text-xl font-bold">FAQs</p>
              <p class="text-dark text-sm font-light">View FAQs for detailed instructions on specific features.</p>
              <p><a href="{{route('faqs')}}" class="text-sm font-light text-indigo-600">Learn more</a></p>
          </div>
  
          <div class="w-full py-7 md:w-1/3">
              <p class="text-xl font-bold">Educatives</p>
              <p class="text-sm font-light">Stay up to date with the latest stories and commentary.</p>
              <p><a href="{{route('articles')}}" class="text-sm font-light text-indigo-600">Learn more</a></p>
          </div>
      </div>
    </div>
  </section>
    <x-footer></x-footer>
</x-app-layout>