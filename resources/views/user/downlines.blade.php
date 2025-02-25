<x-app-layout>    
    <section class="relative pt-14 pb-20 bg-white dark:bg-gray-800 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-6 flex flex-wrap justify-between">
                <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-3 sm:mb-0">
                    My Affiliates
                </h2>
                <a href="{{ route('user.refincome') }}" class="rounded-xl px-6 py-2 border hover:border-2 border-indigo-600 dark:border-blue-500 text-gray-800 dark:text-gray-200 text-xs font-bold tracking-wide capitalize">Affliate reward</a>
            </div>
            <div class="overflow-x-auto">
                @if (count($downlines)>0)
                <table class="table table-auto text-left">
                    @php
                        $contentClasses = 'p-2 text-sm text-gray-800 dark:text-gray-200 capitalize';
                        $headerClasses = 'text-xs uppercase text-gray-600 dark:text-gray-400 font-semibold tracking-wide p-2';
                    @endphp
                    <thead>
                        <tr class="border-0 border-b border-gray-300 dark:border-gray-600">
                            <th class="{{$headerClasses}}">ID</th>
                            <th class="{{$headerClasses}}">Name</th>
                            <th class="{{$headerClasses}}">Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($downlines as $d => $downline)
                            <tr class="border-0 border-b border-gray-300 dark:border-gray-900 hover:bg-gray-100 dark:hover:bg-gray-900">
                                <td class="{{$contentClasses}}">{{ dr + 1 }}</td>
                                <td class="{{$contentClasses}}">
                                    {{ $downline->referred->name }}
                                </td>
                                <td class="{{$contentClasses}}">{{ date('M d, Y', strtotime($downline->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                @else
                <p class="flex items-center gap-2">
                    <svg class="size-10 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M8 4h11a2 2 0 1 1 0 4h-7m-4 0h-3a2 2 0 0 1 -.826 -3.822"></path>
                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 1.824 -1.18m.176 -3.82v-7"></path>
                        <path d="M10 12h2"></path>
                        <path d="M3 3l18 18"></path>
                      </svg>
                    <span class="text-lg text-gray-600 dark:text-gray-400">You are yet to invite anyone to the platform, <a href="{{route('user.refincome').'#ref-how-to'}}" class="text-blue-600 dark:text-blue-500 hover:underline">click to start.</a></span>
                </p>
                @endif                
            </div>
        </div>
    </section>
</x-app-layout>
