<x-app-layout> 
    <!-- ====== Team Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
    <div class="mycontainer mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="mx-auto mb-[60px] max-w-[510px] text-center">
            <span class="text-indigo-600 mb-2 block text-lg font-semibold">
              Our Team
            </span>
            <h2
              class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]"
            >
              Who works at BLUESTECH
            </h2>
            <p class="text-body-color text-base">
              Know our passionate and reliable team.
            </p>
          </div>
        </div>
      </div>
      <div class="-mx-4 flex flex-wrap justify-center">
        @if ($members)
            @foreach ($members as $member)
            <div class="w-full px-4 md:w-1/2 xl:w-1/4">
              <div class="mx-auto mb-10 w-full max-w-[370px]">
                <div class="relative overflow-hidden rounded-lg">
                  <img
                    src="{{url('storage/'.$member->team_img)}}"
                    alt="image"
                    class="w-full"
                  />
                  <div class="absolute bottom-5 left-0 w-full text-center">
                    <div
                      class="relative mx-5 overflow-hidden rounded-lg bg-white py-5 px-3"
                    >
                      <h3 class="text-dark text-base font-semibold">{{$member->name}}</h3>
                      <p class="text-body-color text-sm">{{$member->position}}</p>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            @endforeach
        @endif
        {{-- END OF INDIVIDUAL TEAM --}}
      </div>
    </div>
  </section>
  <!-- ====== Team Section End -->
<!-- ====== Blog Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="mycontainer mx-auto">
    <div class="-mx-4 flex flex-wrap justify-center">
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