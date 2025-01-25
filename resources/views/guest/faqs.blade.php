<x-app-layout> 
    <!-- ====== Page Title Section Start -->
<section class="shadow-md py-[70px]" id="contact-header">
    <div class="mx-auto px-4 sm:container">
       <div class="border-stroke border-b stats-link">
          <h2 class="mb-2 text-2xl font-semibold text-white">
             What do you want to know?
          </h2>
          <p class="text-white mb-6 text-sm font-medium">
             Read through some of the frequently asked questions
          </p>
       </div>
    </div>
 </section>
 <!-- ====== Page Title Section End -->
 
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
           Our support team has put together frequently asked questions. Read through our knowledge base to find out more about us.
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
 <!-- ====== Contact Section Start -->
<section class="relative overflow-hidden bg-white py-20 lg:py-[120px]">
    <div class="mycontainer">
      <div class="-mx-4 flex lg:justify-center">        
        <div class="w-full mx-auto px-4 lg:w-1/2 xl:w-5/12">
            <span class="text-center text-indigo-600 mb-4 block text-base font-semibold">
                Contact
              </span>
              <h2
                class="text-center text-dark mb-6 text-[32px] font-bold uppercase sm:text-[40px] lg:text-[36px] xl:text-[40px]"
              >
                ASK US YOUR QUESTION
              </h2>
              <p class="text-body-color text-center mb-9 text-base leading-relaxed">
                Couldn't find the answer to you question? Send it to us and we'll respond immediately
              </p>
         @livewire('contact-us')
              <span class="absolute -top-10 -right-9 z-[-1]">
                <svg
                  width="100"
                  height="100"
                  viewBox="0 0 100 100"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                    fill="#3056D3"
                  />
                </svg>
              </span>
              <span class="absolute -right-10 top-[90px] z-[-1]">
                <svg
                  width="34"
                  height="134"
                  viewBox="0 0 34 134"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle
                    cx="31.9993"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 31.9993 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 31.9993 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 31.9993 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 31.9993 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 31.9993 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 31.9993 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 31.9993 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 31.9993 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 31.9993 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 31.9993 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 17.3333 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 17.3333 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 17.3333 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 17.3333 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 17.3333 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 17.3333 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 17.3333 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 17.3333 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 17.3333 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 17.3333 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 2.66536 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 2.66536 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 2.66536 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 2.66536 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 2.66536 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 2.66536 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 2.66536 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 2.66536 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 2.66536 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 2.66536 1.66665)"
                    fill="#13C296"
                  />
                </svg>
              </span>
              <span class="absolute -left-7 -bottom-7 z-[-1]">
                <svg
                  width="107"
                  height="134"
                  viewBox="0 0 107 134"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle
                    cx="104.999"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 104.999 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 104.999 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 104.999 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 104.999 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 104.999 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 104.999 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 104.999 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 104.999 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 104.999 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="104.999"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 104.999 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 90.3333 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 90.3333 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 90.3333 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 90.3333 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 90.3333 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 90.3333 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 90.3333 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 90.3333 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 90.3333 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="90.3333"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 90.3333 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 75.6654 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 31.9993 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 75.6654 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 31.9993 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 75.6654 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 31.9993 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 75.6654 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 31.9993 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 75.6654 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 31.9993 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 75.6654 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 31.9993 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 75.6654 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 31.9993 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 75.6654 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 31.9993 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 75.6654 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 31.9993 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="75.6654"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 75.6654 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="31.9993"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 31.9993 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 60.9993 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 17.3333 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 60.9993 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 17.3333 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 60.9993 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 17.3333 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 60.9993 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 17.3333 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 60.9993 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 17.3333 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 60.9993 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 17.3333 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 60.9993 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 17.3333 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 60.9993 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 17.3333 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 60.9993 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 17.3333 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="60.9993"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 60.9993 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="17.3333"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 17.3333 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 46.3333 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="132"
                    r="1.66667"
                    transform="rotate(180 2.66536 132)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 46.3333 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="117.333"
                    r="1.66667"
                    transform="rotate(180 2.66536 117.333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 46.3333 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="102.667"
                    r="1.66667"
                    transform="rotate(180 2.66536 102.667)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 46.3333 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="88"
                    r="1.66667"
                    transform="rotate(180 2.66536 88)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 46.3333 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="73.3333"
                    r="1.66667"
                    transform="rotate(180 2.66536 73.3333)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 46.3333 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="45"
                    r="1.66667"
                    transform="rotate(180 2.66536 45)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 46.3333 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="16"
                    r="1.66667"
                    transform="rotate(180 2.66536 16)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 46.3333 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="59"
                    r="1.66667"
                    transform="rotate(180 2.66536 59)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 46.3333 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="30.6666"
                    r="1.66667"
                    transform="rotate(180 2.66536 30.6666)"
                    fill="#13C296"
                  />
                  <circle
                    cx="46.3333"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 46.3333 1.66665)"
                    fill="#13C296"
                  />
                  <circle
                    cx="2.66536"
                    cy="1.66665"
                    r="1.66667"
                    transform="rotate(180 2.66536 1.66665)"
                    fill="#13C296"
                  />
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Contact Section End -->

<!-- ====== Call To Action Section Start -->
<section>
  <div class="container mx-auto">
    <div
      class="bg-indigo-600 relative overflow-hidden rounded py-12 px-8 md:p-[70px] shadow-md"
    >
      <div class="-mx-4 flex flex-wrap items-center">
        <div class="w-full px-4 lg:w-1/2">
          <span class="mb-2 text-base font-semibold text-white">
            Become a huge profiter from the next big move throuh insiders tips
          </span>
          <h2
            class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[38px] lg:mb-0"
          >
            Get started with <br class="xs:block hidden" />
            our free trial
          </h2>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <div class="flex flex-wrap lg:justify-end">
            <a
              href="{{route('login')}}"
              class="hover:text-indigo-600 my-1 mr-4 inline-block rounded bg-white bg-opacity-[15%] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-100 md:px-9 lg:px-6 xl:px-9"
            >
              Get Pro Version
            </a>
            <a
              href="{{route('login')}}"
              class="my-1 inline-block rounded bg-[#13C296] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-90 md:px-9 lg:px-6 xl:px-9"
            >
              Start Free Trial
            </a>
          </div>
        </div>
      </div>
      <div>
        <span class="absolute top-0 left-0 z-[-1]">
          <svg
            width="189"
            height="162"
            viewBox="0 0 189 162"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <ellipse
              cx="16"
              cy="-16.5"
              rx="173"
              ry="178.5"
              transform="rotate(180 16 -16.5)"
              fill="url(#paint0_linear)"
            />
            <defs>
              <linearGradient
                id="paint0_linear"
                x1="-157"
                y1="-107.754"
                x2="98.5011"
                y2="-106.425"
                gradientUnits="userSpaceOnUse"
              >
                <stop stop-color="white" stop-opacity="0.07" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
              </linearGradient>
            </defs>
          </svg>
        </span>
        <span class="absolute bottom-0 right-0 z-[-1]">
          <svg
            width="191"
            height="208"
            viewBox="0 0 191 208"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <ellipse
              cx="173"
              cy="178.5"
              rx="173"
              ry="178.5"
              fill="url(#paint0_linear)"
            />
            <defs>
              <linearGradient
                id="paint0_linear"
                x1="-3.27832e-05"
                y1="87.2457"
                x2="255.501"
                y2="88.5747"
                gradientUnits="userSpaceOnUse"
              >
                <stop stop-color="white" stop-opacity="0.07" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
              </linearGradient>
            </defs>
          </svg>
        </span>
      </div>
    </div>
  </div>
</section>
<!-- ====== Call To Action Section End -->
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