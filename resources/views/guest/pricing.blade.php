<x-app-layout>
     <!-- ====== Page Title Section Start -->
    <section class="bg-slate-100 shadow-md py-[70px]">
      <div class="mx-auto px-4 sm:container">
        <div class="border-stroke border-b">
            <h2 class="mb-2 text-2xl font-semibold text-black">
              BLUESTECH Pricing
            </h2>
            <p class="text-body-color mb-6 text-sm font-medium">
              Why do investors choose us. See our pricing list below. Flexible pricing. Daily income accrual for all pricing.
            </p>
        </div>
      </div>
    </section>
    <!-- ====== Page Title Section End --> 
    <!-- ====== Pricing Section Start -->
<section
class="relative overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
>
<div class="mycontainer mx-auto">
  <div class="flex flex-wrap">
    <div class="w-full px-4">
      <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
        <span class="text-indigo-600 mb-2 block text-lg font-semibold">
          Pricing Table
        </span>
        <h2
          class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]"
        >
          Our Pricing Plan
        </h2>
        <p class="text-body-color text-base">
         These pricing list are drafted with the sole purpose of generating the highest possible return under the least period of time.
         Flexible and accomdates individual and firm of every financial class. Generates daily income daily.New and old Members are 
         been adviced to contact our experts if they have a hard-time choosing a plan they best meet their needs.
        </p>
      </div>
    </div>
  </div>
  <div class="flex flex-wrap justify-center">
    @if (count($plans)>0)
        @foreach ($plans as $plan)
                {{-- INDIVIDUAL PLANS --}}
    <div class="w-full px-4 md:w-1/2 lg:w-1/4">      
      <div
        class="border-indigo-600 shadow-pricing relative mb-10 overflow-hidden rounded-xl border border-opacity-20 bg-white py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:p-12"
      >
        <span class="text-indigo-600 mb-4 block text-lg font-semibold">
          {{$plan->name}}
        </span>
        <h2 class="text-dark mb-5 text-[42px] font-bold">
          {{$plan->interest}}%
          <span class="text-body-color text-base font-medium">
             / {{$plan->duration}} @if($plan->duration==1){{'day'}}@else{{'days'}}@endif</span>
        </h2>
        <p
          class="text-body-color mb-8 border-b border-[#F2F2F2] pb-8 text-base"
        >
          Plan limits: minimum deposits of ${{$plan->min}} and maximum deposits of ${{$plan->max}}.
        </p>
        <div class="mb-7">          
          <p class="text-body-color mb-1 text-base leading-loose">
            Affilaite bonus : {{$plan->ref_commission}}%
          </p>
          <p class="text-body-color mb-1 text-base leading-loose">
            Lifetime access
          </p>                  
          <p class="text-body-color mb-1 text-base leading-loose">
            One year support
          </p>
        </div>
        <a
          href="{{route('user.investment.create',[$plan->id])}}"
          class="text-indigo-600 hover:bg-indigo-600 hover:border-indigo-600 block w-full rounded-md border border-[#D4DEFF] bg-transparent p-4 text-center text-base font-semibold transition hover:text-white"
        >
          Choose {{$plan->name}}
        </a>
        <div>
          <span class="absolute right-0 top-7 z-[-1]">
            <svg
              width="77"
              height="172"
              viewBox="0 0 77 172"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="86" cy="86" r="86" fill="url(#paint0_linear)" />
              <defs>
                <linearGradient
                  id="paint0_linear"
                  x1="86"
                  y1="0"
                  x2="86"
                  y2="172"
                  gradientUnits="userSpaceOnUse"
                >
                  <stop stop-color="#3056D3" stop-opacity="0.09" />
                  <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                </linearGradient>
              </defs>
            </svg>
          </span>
          <span class="absolute right-4 top-4 z-[-1]">
            <svg
              width="41"
              height="89"
              viewBox="0 0 41 89"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle
                cx="38.9138"
                cy="87.4849"
                r="1.42021"
                transform="rotate(180 38.9138 87.4849)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="74.9871"
                r="1.42021"
                transform="rotate(180 38.9138 74.9871)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="62.4892"
                r="1.42021"
                transform="rotate(180 38.9138 62.4892)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="38.3457"
                r="1.42021"
                transform="rotate(180 38.9138 38.3457)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="13.634"
                r="1.42021"
                transform="rotate(180 38.9138 13.634)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="50.2754"
                r="1.42021"
                transform="rotate(180 38.9138 50.2754)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="26.1319"
                r="1.42021"
                transform="rotate(180 38.9138 26.1319)"
                fill="#3056D3"
              />
              <circle
                cx="38.9138"
                cy="1.42021"
                r="1.42021"
                transform="rotate(180 38.9138 1.42021)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="87.4849"
                r="1.42021"
                transform="rotate(180 26.4157 87.4849)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="74.9871"
                r="1.42021"
                transform="rotate(180 26.4157 74.9871)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="62.4892"
                r="1.42021"
                transform="rotate(180 26.4157 62.4892)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="38.3457"
                r="1.42021"
                transform="rotate(180 26.4157 38.3457)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="13.634"
                r="1.42021"
                transform="rotate(180 26.4157 13.634)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="50.2754"
                r="1.42021"
                transform="rotate(180 26.4157 50.2754)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="26.1319"
                r="1.42021"
                transform="rotate(180 26.4157 26.1319)"
                fill="#3056D3"
              />
              <circle
                cx="26.4157"
                cy="1.4202"
                r="1.42021"
                transform="rotate(180 26.4157 1.4202)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="87.4849"
                r="1.42021"
                transform="rotate(180 13.9177 87.4849)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="74.9871"
                r="1.42021"
                transform="rotate(180 13.9177 74.9871)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="62.4892"
                r="1.42021"
                transform="rotate(180 13.9177 62.4892)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="38.3457"
                r="1.42021"
                transform="rotate(180 13.9177 38.3457)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="13.634"
                r="1.42021"
                transform="rotate(180 13.9177 13.634)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="50.2754"
                r="1.42021"
                transform="rotate(180 13.9177 50.2754)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="26.1319"
                r="1.42021"
                transform="rotate(180 13.9177 26.1319)"
                fill="#3056D3"
              />
              <circle
                cx="13.9177"
                cy="1.42019"
                r="1.42021"
                transform="rotate(180 13.9177 1.42019)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="87.4849"
                r="1.42021"
                transform="rotate(180 1.41963 87.4849)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="74.9871"
                r="1.42021"
                transform="rotate(180 1.41963 74.9871)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="62.4892"
                r="1.42021"
                transform="rotate(180 1.41963 62.4892)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="38.3457"
                r="1.42021"
                transform="rotate(180 1.41963 38.3457)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="13.634"
                r="1.42021"
                transform="rotate(180 1.41963 13.634)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="50.2754"
                r="1.42021"
                transform="rotate(180 1.41963 50.2754)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="26.1319"
                r="1.42021"
                transform="rotate(180 1.41963 26.1319)"
                fill="#3056D3"
              />
              <circle
                cx="1.41963"
                cy="1.4202"
                r="1.42021"
                transform="rotate(180 1.41963 1.4202)"
                fill="#3056D3"
              />
            </svg>
          </span>
        </div>
      </div>
    </div>
    {{-- END OF INDIVIDUAL PLAN --}}
        @endforeach
    @endif
  </div>
</div>
</section>
<!-- ====== Pricing Section End -->
<!-- ====== Testimonials Section Start -->
<section class="pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]" id="testimony">
  <div class="mycontainer mx-auto">
    <div
      x-data="
        {
        slides: ['1','2','3'],
        activeSlide: 1,
        activeButton: 'w-[30px] bg-indigo-600',
        button: 'w-[10px] bg-[#E4E4E4]'
        }
        "
    >
      <div class="relative flex justify-center">
        <div
          class="relative w-full pb-16 md:w-11/12 lg:w-10/12 xl:w-8/12 xl:pb-0"
        >
          <div
            class="snap xs:max-w-[368px] flex-no-wrap mx-auto flex h-auto w-full max-w-[300px] overflow-hidden transition-all sm:max-w-[508px] md:max-w-[630px] lg:max-w-[738px] 2xl:max-w-[850px]"
            x-ref="carousel"
          >
          <!-- START OF INDIVIDUAL TESTIMONY -->
          @if (count($testimonials)>0)
              @foreach ($testimonials as $testimonial)
              <div
              class="xs:min-w-[368px] mx-auto h-full min-w-[300px] sm:min-w-[508px] sm:p-6 md:min-w-[630px] lg:min-w-[738px] 2xl:min-w-[850px]"
            >
              <div class="w-full items-center md:flex testimony-content">
                <div
                  class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] 2xl:mr-16"
                >
                  <img
                    src="{{url('storage/'.$testimonial->testifier_img)}}"
                    alt="image"
                    class="w-full"
                  />
                  <span class="absolute -top-6 -left-6 z-[-1] hidden sm:block">
                    <svg
                      width="77"
                      height="77"
                      viewBox="0 0 77 77"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        cx="1.66343"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 1.66343 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 1.66343 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 16.3016 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 16.3016 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 30.9398 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 30.9398 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="74.5221"
                        r="1.66343"
                        transform="rotate(-90 45.578 74.5221)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="30.94"
                        r="1.66343"
                        transform="rotate(-90 45.578 30.94)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 60.2162 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="74.5216"
                        r="1.66343"
                        transform="rotate(-90 74.6634 74.5216)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 60.2162 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="30.9398"
                        r="1.66343"
                        transform="rotate(-90 74.6634 30.9398)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 1.66343 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 1.66343 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 16.3016 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 16.3016 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 30.9398 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 30.9398 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 45.578 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 45.578 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 60.2162 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="59.8839"
                        r="1.66343"
                        transform="rotate(-90 74.6634 59.8839)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 60.2162 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="16.3017"
                        r="1.66343"
                        transform="rotate(-90 74.6634 16.3017)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 1.66343 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="1.66343"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 1.66343 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 16.3016 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="16.3016"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 16.3016 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 30.9398 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="30.9398"
                        cy="1.66342"
                        r="1.66343"
                        transform="rotate(-90 30.9398 1.66342)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="45.2455"
                        r="1.66343"
                        transform="rotate(-90 45.578 45.2455)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="45.578"
                        cy="1.66344"
                        r="1.66343"
                        transform="rotate(-90 45.578 1.66344)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 60.2162 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="45.2458"
                        r="1.66343"
                        transform="rotate(-90 74.6634 45.2458)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="60.2162"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 60.2162 1.66371)"
                        fill="#3056D3"
                      />
                      <circle
                        cx="74.6634"
                        cy="1.66371"
                        r="1.66343"
                        transform="rotate(-90 74.6634 1.66371)"
                        fill="#3056D3"
                      />
                    </svg>
                  </span>
                  <span class="absolute -bottom-6 -right-6 z-[-1]">
                    <svg
                      width="64"
                      height="64"
                      viewBox="0 0 64 64"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z"
                        stroke="#13C296"
                        stroke-width="6"
                      />
                    </svg>
                  </span>
                </div>
                <div class="w-full">
                  <div>
                    <div class="mb-7">
                      <svg style="color: rgb(104, 117, 245)" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16"> <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/> <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/> </svg>
                    </div>
                    <p
                      class="text-body-color mb-11 text-base font-medium italic sm:text-lg"
                    >
                      {{$testimonial->testimony}}
                    </p>
                    <h4 class="text-dark text-xl font-semibold">
                      {{$testimonial->testifier}}
                    </h4>
                    <p class="text-body-color text-base">
                      {{$testimonial->testifier_job}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
              @endforeach
          @endif
          <!-- END OF INDIVIDUAL TESTIMONY -->
          </div>
          <div
            class="absolute left-0 right-0 bottom-0 flex items-center justify-center lg:pl-[120px] 2xl:pl-0 testimony-content"
          >
            <button
              class="text-indigo-600 hover:bg-indigo-600 shadow-input mx-1 flex h-12 w-12 items-center justify-center rounded-full bg-white transition-all hover:text-white"
              @click="$refs.carousel.scrollLeft = $refs.carousel.scrollLeft - ($refs.carousel.scrollWidth / slides.length); activeSlide -= 1"
            >
              <svg
                width="15"
                height="13"
                viewBox="0 0 15 13"
                class="fill-current"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M5.24264 11.8033L0.46967 7.03037C0.176777 6.73748 0.176777 6.2626 0.46967 5.96971L5.24264 1.19674C5.53553 0.903845 6.01041 0.903845 6.3033 1.19674C6.59619 1.48963 6.59619 1.96451 6.3033 2.2574L2.81066 5.75004H14C14.4142 5.75004 14.75 6.08583 14.75 6.50004C14.75 6.91425 14.4142 7.25004 14 7.25004H2.81066L6.3033 10.7427C6.59619 11.0356 6.59619 11.5104 6.3033 11.8033C6.01041 12.0962 5.53553 12.0962 5.24264 11.8033Z"
                />
              </svg>
            </button>
            <button
              class="text-indigo-600 hover:bg-indigo-600 shadow-input mx-1 flex h-12 w-12 items-center justify-center rounded-full bg-white transition-all hover:text-white"
              @click="$refs.carousel.scrollLeft = $refs.carousel.scrollLeft + ($refs.carousel.scrollWidth / slides.length); activeSlide += 1"
            >
              <svg
                width="15"
                height="13"
                viewBox="0 0 15 13"
                class="fill-current"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.75736 11.8033L14.5303 7.03037C14.8232 6.73748 14.8232 6.2626 14.5303 5.96971L9.75736 1.19674C9.46447 0.903845 8.98959 0.903845 8.6967 1.19674C8.40381 1.48963 8.40381 1.96451 8.6967 2.2574L12.1893 5.75004H1C0.585786 5.75004 0.25 6.08583 0.25 6.50004C0.25 6.91425 0.585786 7.25004 1 7.25004H12.1893L8.6967 10.7427C8.40381 11.0356 8.40381 11.5104 8.6967 11.8033C8.98959 12.0962 9.46447 12.0962 9.75736 11.8033Z"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Testimonials Section End -->

  <!-- ====== FAQ Section Start -->
<section
x-data="
 {
 openFaq1: false, 
 openFaq2: false, 
 openFaq3: false, 
 openFaq4: false, 
 openFaq5: false, 
 openFaq6: false
 }
 "
class="relative overflow-hidden bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
>
<div class="mycontainer mx-auto">
  <div class="mx-4 flex flex-wrap">
    <div class="w-full px-4">
      <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
        <span class="mb-2 block text-lg font-semibold text-indigo-600">
          FAQ
        </span>
        <h2
          class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]"
        >
          Any Questions? Look Here
        </h2>
        <p class="text-base text-body-color">
          There are many variations of passages of Lorem Ipsum available but
          the majority have suffered alteration in some form.
        </p>
      </div>
    </div>
  </div>
  <div class="mx-4 flex flex-wrap">
    {{-- INDIVIDUAL FAQ HALF --}}
    <div class="w-full px-4 lg:w-1/2">
      {{-- INDIVIDUAL FAQ --}}
      @if (count($firstfaqs)>0)
        @foreach ($firstfaqs as $first)
        <div
        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-slate-100  p-4 sm:p-8 lg:px-6 xl:px-8"
      >
        <button
          class="faq-btn flex w-full text-left"
          @click="openFaq1 = !openFaq1"
        >
          <div
            class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-indigo-600 bg-opacity-5 text-indigo-600"
          >
            <svg
              width="17"
              height="10"
              viewBox="0 0 17 10"
              class="icon fill-current"
            >
              <path
                d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                fill="#3056D3"
                stroke="#3056D3"
              />
            </svg>
          </div>
          <div class="w-full">
            <h4 class="text-lg font-semibold text-black">
              {{$first->question}}?
            </h4>
          </div>
        </button>
        <div x-show="openFaq1" class="faq-content pl-[62px]">
          <p class="py-3 text-base leading-relaxed text-body-color">
           {{$first->answer}}.
          </p>
        </div>
      </div>
        @endforeach          
      @endif
      {{-- END OF INDIVIDUAL FAQ --}}
    </div>
    {{-- END OF INDIVIDUAL FAQ HALF --}}

    {{-- START OF ANOTHER INDIVIDUAL FAQ HALF --}}
    <div class="w-full px-4 lg:w-1/2">
       {{-- START OF INDIVIDUAL FAQ --}}
      @if (count($secondfaqs)>0)
          @foreach ($secondfaqs as $second)             
            <div
            class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-slate-100 p-4 sm:p-8 lg:px-6 xl:px-8"
          >
            <button
              class="faq-btn flex w-full text-left"
              @click="openFaq4 = !openFaq4"
            >
              <div
                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-indigo-600 bg-opacity-5 text-indigo-600"
              >
                <svg
                  width="17"
                  height="10"
                  viewBox="0 0 17 10"
                  class="icon fill-current"
                >
                  <path
                    d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                    fill="#3056D3"
                    stroke="#3056D3"
                  />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="text-lg font-semibold text-black">
                  {{$second->question}}?
                </h4>
              </div>
            </button>
            <div x-show="openFaq4" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color">
               {{$second->answer}}.
              </p>
            </div>
          </div>
          @endforeach
      @endif      
      {{-- END OF INDIVIDUAL FAQ --}}
    </div>
    {{-- END OF ANOTHER FAQ HALF --}}
  </div>
</div>
<div class="absolute bottom-0 right-0 z-[-1]">
  <svg
    width="1440"
    height="886"
    viewBox="0 0 1440 886"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      opacity="0.5"
      d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
      fill="url(#paint0_linear)"
    />
    <defs>
      <linearGradient
        id="paint0_linear"
        x1="1308.65"
        y1="1142.58"
        x2="602.827"
        y2="-418.681"
        gradientUnits="userSpaceOnUse"
      >
        <stop stop-color="#3056D3" stop-opacity="0.36" />
        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
      </linearGradient>
    </defs>
  </svg>
</div>
</section>
<!-- ====== FAQ Section End -->

<x-footer></x-footer>
</x-app-layout>