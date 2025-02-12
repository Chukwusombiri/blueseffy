@props(['title','titleDesc'=>'','bgImage' => '/images/page-header.jpg'])

<section class="bg-cover bg-center" style="background-image: url({{$bgImage}})">
    <div class="bg-gray-900 bg-opacity-50 backdrop-blur-[2px] py-12">
        <div class="max-w-6xl mx-auto px-6 md:px-10 border-b flex flex-col gap-4">
            <h2 class="text-2xl font-semibold text-white capitalize">
                {{$title}}
            </h2>
            <div class="text-white text-sm font-medium">
                <p class="mb-1">{{$titleDesc}}</p>
                <p class="mb-1">Last Login: {{ date('M d, y', strtotime(auth()->user()->last_sign_in_at)) }}</p>
                <p class="uppercase font-semibold mb-4 flex items-center text-sm">
                    <span>Status:</span>
                    <span class="ml-3 py-1 px-4 md:px-6 md:py-2 rounded-full bg-indigo-600 dark:bg-blue-500 text-xs">
                        @if (auth()->user()->is_paused)
                            {{ 'ACCOUNT SUSPENDED' }}
                        @else
                            @switch(auth()->user()->status)
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
                    </span>
                </p>
            </div>
        </div>
    </div>
</section>