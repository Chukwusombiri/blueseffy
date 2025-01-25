<x-app-layout>
    <section class="shadow-md" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/page-header.jpg') no-repeat center;background-size:cover">
        <div class="mx-auto px-4 sm:container py-[70px]">
           <div class="border-stroke border-b stats-link">
              <h2 class="mb-2 text-2xl font-semibold text-white">
                 Subscription records
              </h2>
              <p class="text-white mb-6 text-sm font-medium">
                 Monitor your subscriptions. Purchase new suscriptions for your portfolio.<br>
                 Last Login: {{auth()->user()->last_sign_in_at}} <br>
                 Status: <span  class="inline-block py-1 px-2 rounded-full bg-indigo-400">@switch(auth()->user()->status)
                     @case('earning')
                         {{'ACTIVE TRADING'}}
                         @break
                     @case('not_earning')
                        {{'TRADING SESSION COMPLETED'}}
                        @break
                    @case('dormant')
                        {{'DORMANT'}}
                        @break
                    @case('active')
                        {{'YET TO TRADE'}}
                        @break                    
                 @endswitch</span>
              </p>
           </div>
        </div>
     </section>     
     <section class="max-w-6xl mx-auto mt-16 mb-16 pb-10 md:mb-24 md:pb-24">
        @if (session('notify'))
            <div class="bg-yellow-100 text-yellow-900 font-semibold text-sm p-4 mb-6 shadow rounded">{!! session('notify') !!}</div>
        @endif
        <div class="flex flex-wrap justify-between items-center mb-10">
            <h2 class="font-bold text-3xl mb-4 md:mb-0">My Subscriptions</h2>
            <a href="{{route('artemis').'#plans'}}" class="bg-gray-900 hover:bg-gray-700 text-white font-semibold text-sm px-6 py-3 rounded-xl shadow">Buy new</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 max-h-[600px]">            
            <div class="overflow-auto">
            <table class="w-full table-auto text-left">
                <thead>
                    <tr class="border-b border-gray-300">
                        <th class="py-2 px-4 font-bold text-gray-700">Software</th>
                        <th class="py-2 px-4 font-bold text-gray-700">Price</th>
                        <th class="py-2 px-4 font-bold text-gray-700">Days left</th>
                        <th class="py-2 px-4 font-bold text-gray-700">Status</th>
                        <th class="py-2 px-4 font-bold text-gray-700">Purchased on</th>
                    </tr>
                </thead>
                <tbody>
                   @if (count(auth()->user()->userBots)>0)
                        @foreach (auth()->user()->userBots as $sub)
                        <tr class="border-b border-gray-300">
                            <td class="py-2 px-4 text-gray-700">{{$sub->bot}}</td>
                            <td class="py-2 px-4 text-gray-700">${{$sub->price}}</td>
                            <td class="py-2 px-4 text-gray-700">{{$sub->days_left}}</td>                                                            
                            @php
                                $color = '';
                                switch ($sub->status) {
                                    case 'pending':
                                        $color = 'yellow';
                                        break;
                                    case 'active':
                                        $color = 'emerald';
                                        break;
                                    case 'suspended':
                                        $color = 'gray';
                                        break;
                                    case 'expired':
                                        $color = 'rose';
                                        break;
                                    default:
                                        $color = 'yellow';
                                        break;
                                }
                            @endphp 
                            <td class="py-2 px-4 text-{{$color}}-600 font-semibold">{{$sub->status}}</td>                            
                            <td class="py-2 px-4 whitespace-nowrap">{{date('M d y',strtotime($sub->created_at))}}</td>
                        </tr>
                        @endforeach
                   @endif                              
                </tbody>
            </table>
            </div>           
        </div>
     </section>   
</x-app-layout>