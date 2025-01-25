<x-app-layout> 
 <!-- ====== Page Title Section Start -->
<section class="bg-white" style="padding-top: 20px" style="overflow-x: hidden">
  <div class="mx-auto px-4 sm:container">
     <div class="border-stroke border-b">
        <h2 class="mb-2 text-2xl font-semibold text-black">
           About BLUESTECH
        </h2>
        <p class="text-body-color mb-6 text-sm font-medium">
           Learn more about us. Why investors choose us. Know what other investors have said about BLUESTECH. See our stats.
        </p>
     </div>
  </div>
</section>
<!-- ====== Page Title Section End -->
    <!-- ====== About Section Start -->
    <section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]" style="overflow-x: hidden">
      <div class="mycontainer">
        <div id="flexRow">
          <div>
            <div>
              <div>
                <div class="py-3 sm:py-4">
                  <img
                    src="{{url('images/trading.jpg')}}"
                    alt=""
                    class="w-full object-cover"
                  />
                </div>              
              </div>           
            </div>
          </div>
          <div class="px-4">
            <div class="mt-10 lg:mt-0">
              <span class="text-indigo-600 mb-2 block text-lg font-semibold">
                Why Choose Us
              </span>
              <h2 class="text-dark mb-8 text-3xl font-bold sm:text-4xl">
                A Place Where Every Investor Feels Appreciated.
              </h2>
              <p class="text-body-color mb-8 text-base">
                BLUESTECH is a financial assets management and development organization. We're managing and controlling financial and digital assets
                belonging to wealthy minority of the world's population. We started off as a financial manager, secured and protected clients from bankruptcy
                and gradually garnered enough experience and human capital thereby boosting quality number of financial analysts, Asset managers and 
                data scientist. We make us of the high-level technologies thereby relaibly securing investors funds and daily profits.
              </p>
              <p class="text-body-color mb-12 text-base">
                BLUESTECH faciliates thousands of daily transaction through digital assets and fiat thereby allowing room for flexibility and 
                speed of operations.
              </p>
              <div class="flex item-center justify-start">
                  <a
                href="{{route('certificate')}}"
                class="mx-3 px-4 bg-indigo-600 rounded-lg py-4 text-center
                 text-base text-white 
                 hover:bg-opacity-90 lg:px-8 xl:px-10"
              >
                our certificate
              </a>
              <a
                  href="{{route('pdf')}}"
                  class=" px-4 bg-indigo-600 rounded-lg py-4 
                  text-center text-base text-white 
                  hover:bg-opacity-90 lg:px-8 xl:px-10"
              >
                 our pdf
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
    <!-- ====== About Section End -->
     <!-- ====== Brands Section Start -->
<section class="py-20 lg:py-[120px]"  id="stats" style="overflow-x: hidden">
  <div class="mycontainer">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4">
        <div class="flex flex-wrap items-center justify-center">
          <a
            href="javascript:void(0)"
            class="mx-4 flex flex-col w-[150px] items-center justify-center py-5 2xl:w-[180px] stats-link"
          >
          <div class="flex">
              <svg style="color: rgb(104, 117, 245);" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"> <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/> </svg>                
            </div>
          <span class="text-white">{{$company->active_accounts}} Members</span>
          </a>
          <a
            href="javascript:void(0)"
            class="mx-4 flex flex-col w-[150px] items-center justify-center py-5 2xl:w-[180px] stats-link"
          >
          <div class="flex justify-center">
              <svg style="color: rgb(104, 117, 245);" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16"> <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/> </svg>                   
          </div>
            <span class="text-white">{{$company->deposits}} Deposits</span>              
          </a>
          <a
            href="javascript:void(0)"
            class="mx-4 flex flex-col w-[150px] items-center justify-center py-5 2xl:w-[180px] stats-link"
          >
              <div class="flex justify-center">
                  <svg style="color: rgb(104, 117, 245);" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"> <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> </svg>                   
              </div>
              <span class="text-white">{{$company->withdrawal}} withdrawals</span>
          </a>
          <a
            href="javascript:void(0)"
            class="mx-4 flex flex-col w-[150px] items-center justify-center py-5 2xl:w-[180px] stats-link"
          >
              <div class="flex justify-center">
                  <svg style="color: rgb(104, 117, 245);" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"> <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/> </svg>                    
              </div>
              <span class="text-white">{{$company->daily_transaction}} transactions</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Brands Section End -->
 <!-- ====== Cards Section Start -->
 <section class="bg-[#F3F4F6] pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="mycontainer">
    <div class="mx-4 flex flex-wrap">
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-01.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
                Our Vision
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
             We aim to change the perception and stereotypes surrounding financial investments and financial instruments as a risky investment
             that will always lead to losses and nothing good can come out of it for an individual investor.
            </p>              
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-02.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
                Our Mission
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
              BLUESTECH wants to give every individual, firm or community a chance at the financial markets and to have good stories to tell 
              afterwards. To help everyone have a say on the financial markets and how it governs our livelihood.
            </p>              
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
          <img
            src="https://cdn.tailgrids.com/2.0/image/application/images/cards/card-01/image-03.jpg"
            alt="image"
            class="w-full"
          />
          <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
            <h3>
              <a
                href="javascript:void(0)"
                class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
              >
               You can do it with BLUESTECH
              </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
              There are many success stories from our members. You can also join us today and become a big part of what we've got going at BLUESTECH LTD.
              Whether you have $100 or more, be rest assured we'll put it to good use.
            </p>             
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Cards Section End -->
<!-- ====== Blog Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20" style="overflow-x: hidden">
  <div class="mycontainer">
    <div class="mx-4 flex flex-wrap justify-center">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
          <span class="text-indigo-600 mb-2 block text-lg font-semibold">
            Educatives
          </span>
          <h2
            class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]"
          >
            Our Recent Articles
          </h2>
          <p class="text-body-color text-base">
            We aim to keep our members informed and knowledgeabe when it comes to matters of the financial markets. Read through this articles and so many 
            others to stay informed with the developments in the markets.
          </p>
        </div>
      </div>
    </div>
    <div class="mx-4 flex flex-wrap">
       {{-- individual article --}}
      @if (count($articles)>0)
          @foreach ($articles as $article)
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
              <div class="mx-auto mb-10 max-w-[370px]">
                <div class="mb-8 overflow-hidden rounded">
                  <img
                    src="{{url('storage/'.$article->cover_img)}}"
                    alt="image"
                    class="w-full"
                  />
                </div>           
                <div>
                  <span
                    class="bg-indigo-600 mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
                  >
                    {{date('M d, y',strtotime($article->created_at))}}
                  </span>
                  <h3>
                    <a
                      href="javascript:void(0)"
                      class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
                    >
                      {{$article->title}}
                    </a>
                  </h3>
                  <p class="text-body-color text-base">
                    Follow this article to the end. <span class="underline">Read more.</span>
                  </p>
                </div>            
              </div>
            </div>
          @endforeach            
      @endif
      {{-- ends individual article --}}
    </div>
    <div class="flex justify-center py-10">
      <a href="{{route('articles')}}" class="bg-indigo-600 mb-5 inline-block rounded py-1 
      px-4 text-center text-xs font-semibold leading-loose text-white">View all</a>
    </div>
  </div>
</section>
<!-- ====== Blog Section End -->
  <x-footer></x-footer>
</x-app-layout>