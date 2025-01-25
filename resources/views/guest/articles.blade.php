<x-app-layout> 
       <!-- ====== Page Title Section Start -->
<section class="shadow-md py-[70px]" id="mypage-header">
    <div class="mx-auto px-4 sm:container">
       <div class="border-stroke border-b stats-link">
          <h2 class="mb-2 text-2xl font-semibold text-white">
             Get first hand knowledge
          </h2>
          <p class="text-white mb-6 text-sm font-medium">
             Stay informed with some the recent events in the financial markets. Free access to our educative articles on the markets and Investments.
          </p>
       </div>
    </div>
 </section>
 <!-- ====== Page Title Section End -->
 <section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="mycontainer">
        <div class="flex flex-wrap">
            @if (count($articles)>0)
            <div class="w-full lg:w-8/12">
                @foreach ($articles as $article)
                    <div class="pt-15 pb-18 mb-7 lg:mr-4 last:pb-20">
                        <div class="w-full">
                            <a href="{{route('readarticle',[$article->id])}}" class="block w-full"><img src="/storage/{{$article->cover_img}}" class="w-full" alt="blog"></a>
                        </div>
                        <div class="pt-10 px-7">
                            <a href="{{route('readarticle',[$article->id])}}" class="inline-block text-indigo-600 text-2xl font-bold">{{$article->title}}</a>
                            <ul role="list" class="text-dark text-xl">
                                <li>Published: {{date('M d, y',strtotime($article->created_at))}}</li>
                                <li>By {{$article->author}}</li>
                            </ul>                            
                            <a href="{{route('readarticle',[$article->id])}}" class="underline capitalize text-indigo-600 hover:text-indigo-400">Read More</a>
                        </div>
                    </div>    
                @endforeach                                                            
            </div>
          @endif  
            <div class="w-full lg:w-4/12"> 
                @if (count($categories)>0)
                    <div class="bg-white p-10 mb-45 rounded-md shadow-lg">
                        <h2 class="text-indigo-600 mb-3 uppercase">News Category</h2>
                        <ul>
                        @foreach ($categories as $category)
                        <li class="flex bg-slate-500 text-white hover:bg-slate-400 p-4 mb-2 rounded-md">
                            <span class="flex items-center text-primary mr-2 text-base">
                                <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                                  <path
                                    d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z"
                                  ></path>
                                </svg>
                              </span>
                            <a href="{{route('articles',[$category->id])}}">{{$category->name}}</a>
                        </li>                       
                        @endforeach
                        </ul>
                    </div>
                @endif                              
                @if ($artwithcomments && count($artwithcomments)>0)
                    <div class="bg-white mb-45">
                        <h2 class="text-indigo-600 mb-3 uppercase">Trending News</h2>
                        <div class="flex flex-wrap items-center jsutify-around"></div>                    
                        @foreach ($artwithcomments as $artwithcomment)
                            <div class="w-full mb-20 md:w-1/2 lg:w-1/3 xl:w-1/4">
                                <div class="w-full">
                                    <a href="{{route('readarticle',[$artwithcomment->id])}}" class="block w-full"><img src="/storage/{{$artwithcommment->cover_img}}" class="w-full" alt="Trending News"></a>
                                </div>
                                <div class="px-2">
                                    <a href="{{route('readarticle',[$artwithcomment->id])}}" class="text-dark text-ld">{{$artwithcomment->title}}</a>
                                    <span class="text-slate-500 text-base">{{$artwithcomment->created_at}}</span>
                                </div>                                
                            </div>       
                        @endforeach            
                    </div>
                @endif                                            
            </div>                      
        </div>
    </div>
</section>
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
              <a href="{{route('articles')}}" class="text-sm font-light text-indigo-600">Learn more</a>           
          </div>
      </div>
    </div>
  </section>
<x-footer></x-footer>
</x-app-layout>