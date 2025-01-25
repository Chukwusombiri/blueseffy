<x-app-layout> 
   <section class="relative bg-slate-100 pt-[120px] pb-[110px] lg:pt-[150px]">
      <div class="mycontainer">
          <div class="flex flex-nowrap justify-center">
              <div class="w-full">
                  <div class="w-full">
                      <img src="{{url('storage/'.$article->cover_img)}}" alt="blog" class="w-full">
                  </div>
                  <div class="py-7 w-full">
                      <ul>
                          <li class="text-slate-600">Published on {{date('M d, y',strtotime($article->created_at))}}</li>
                          <li class="text-dark">By {{$article->author}}</li>
                      </ul>
                      <h2 class="py-7 text-indigo-600 font-extrabold text-2xl">{{$article->title}}</h2>
                      <p class="text-base text-slate-600 font-normal pb-7">{{$article->main_content}}</p>                    
                      <h2 class="text-dark text-xl pb-7">{{$article->sub_title}}</h2>
                      <p class="text-slate-600 text-base font-normal">{{$article->sub_content}}</p>
                  </div>
              </div>
          </div>
          <div class="py-7">
              <div class="flex flex-nowrap">
                  <div class="w-full">
                      <div class="w-full">
                          <span>CATEGORY: <a class="inline-block bg-indigo-600 px-4 text-white rounded-md" href="{{route('articles',[$article->category_id])}}">{{$article->category->name}}</a></span>                                                                                                          
                      </div>
                  </div>                
              </div>
          </div>
          <div class="bg-white rounded-md shadow-md text-slate-600" style="padding-top: 10px;padding-bottom:10px">
              <ul class="flex flex-nowrap justify-start item-center">
                  <li class="flex items-center justify-start">
                      <div class="flex items-center text-indigo-400 px-2 text-base">
                          <img src="/storage/{{$article->author_img}}" width="100" height="100" alt="user" class="rounded-full">
                      </div>
                      <div class="w-8/12 px-2">
                          <h4 class="text-dark text-lg font-bold">{{$article->author}}</h4>
                          <p class="text-slate-600 text-base font-normal">{{$article->author_comment}}</p>
                      </div>
                  </li>
              </ul>
          </div>
          @if (count($article->articlecomments) > 0)
          <div class="py-7">
              <h3 class="text-indigo-600 text-xl font-bold">{{$article->articlecomments->count()}} Comments on this post</h3>
              <ul class="py-4">
                  @foreach ($article->articlecomments as $comment)                       
                      <li class="flex items-center">
                        <div class="flex items-center text-primary mx-2 px-2 text-base">
                            <img src="/storage/{{$comment->commenter_img}}" width="100" height="100" alt="user" class="rounded-full">
                        </div>
                        <div class="w-8/12">
                            <h4 class="text-dark text-lg font-bold">{{$comment->commenter}}</h4>
                            <p class="text-slate-600 text-base font-normal">{{$comment->comment}}</p>
                            <span class="text-slate-600 text-base font-normal">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                    </li>   
                  @endforeach                                          
              </ul>
          </div>
          @endif
          <div class="flex flex-row flex-wrap justify-center pt-7">              
              <div class="w-full lg:w-1/2">
                <h3 class="w-full text-lg text-slate-600 pb-3.5">Leave a comment</h3>   
                <div class="mycontainer">
                    @livewire('contact-us')  
                </div>                          
              </div>  
              {{-- NEED HELP --}}
                <div class="w-full pl-4 lg:w-1/2 pt-7 self-center">
                    <h2 class="text-indigo-600 text-2xl font-extrabold">Need Help ?</h2>
                    <div class="flex flex-wrap justify-center pt-7">
                
                        <div class="w-full py-7">          
                            <p class="text-xl font-bold">24/7 Chat Support</p>
                            <p class="text-sm font-light">Get 24/7 chat support with our friendly customer service agents at your service.</p>
                            <p><a href="javascript:void(0)" class="text-sm font-light text-indigo-600">Learn more</a></p>          
                        </div>
                
                        <div class="w-full py-7">
                            <p class="text-xl font-bold">FAQs</p>
                            <p class="text-dark text-sm font-light">View FAQs for detailed instructions on specific features.</p>
                            <p><a href="{{route('faqs')}}" class="text-sm font-light text-indigo-600">Learn more</a></p>
                        </div>
                
                        <div class="w-full py-7">
                            <p class="text-xl font-bold">Educatives</p>
                            <p class="text-sm font-light">Stay up to date with the latest stories and commentary.</p>
                            <p><a href="{{route('articles')}}" class="text-sm font-light text-indigo-600">Learn more</a></p>
                        </div>
                    </div> 
                </div>                    
          </div>
          @if (count($artswithcomments)>0)
              <div class="pt-6">
                  <h3 class="text-dark font-extrabold text-xl">Popular News</h3>
                  <div class="flex flex-wrap justify-center items-center">
                      @foreach ($artswithcomments as $item)
                          <div class="w-full md:w-1/2 lg:w-1/3">
                              <div class="w-full">
                                    <a href="{{route('readarticle',[$item->id])}}" class="block w-full"><img src="/storage/{{$item->cover_img}}" class="w-full" alt="blog"></a>
                              </div>
                              <div class="pt-10 px-7">
                                    <a href="{{route('readarticle',[$item->id])}}" class="inline-block text-indigo-600 text-2xl font-bold">{{$article->title}}</a>
                                    <ul role="list" class="text-dark text-xl">
                                       <li>Published: {{date('M d, y',strtotime($item->created_at))}}</li>
                                       <li>By {{$item->author}}</li>
                                    </ul>                            
                                    <a href="{{route('readarticle',[$item->id])}}" class="underline capitalize text-indigo-600 hover:text-indigo-400">Read More</a>
                              </div>
                          </div> 
                      @endforeach                                                    
                  </div>
              </div>
          @endif
      </div>
  </section>
   <x-footer></x-footer> 
</x-app-layout>