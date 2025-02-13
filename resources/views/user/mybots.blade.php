<x-app-layout>
    <x-user-header title="Subscription records" titleDesc="Monitor your subscriptions. Purchase new suscriptions for your portfolio." />
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6">
            @if (session('notify'))
                <div class="bg-yellow-100 text-yellow-900 font-semibold text-xs p-4 mb-6 shadow rounded-lg">
                    {!! session('notify') !!}</div>
            @endif
            <div class="flex flex-wrap gap-4 justify-between items-center mb-10">
                <h2 class="font-semibold text-3xl text-gray-700 dark:text-gray-200">My Subscriptions</h2>
                <a href="{{ route('artemis') . '#plans' }}"
                    class="bg-gray-900 dark:bg-blue-700 hover:bg-gray-700 dark:hover:bg-blue-800 text-white font-semibold text-sm px-6 py-3 rounded-xl shadow">Buy
                    new</a>
            </div>
            <div class="max-h-[600px] mb-12 lg:mb-20">
                <div class="overflow-auto">
                    <table class="w-full table-auto text-left">
                        <thead>
                            <tr class="border-0 border-b border-gray-300 dark:border-gray-600">
                                <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Software</th>
                                <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Price</th>
                                <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Days left</th>
                                <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Status</th>
                                <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Purchased on</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count(auth()->user()->userBots) > 0)
                                @foreach (auth()->user()->userBots as $sub)
                                    <tr class="border-0 border-b border-gray-300 dark:border-gray-600 hover:bg-gray-900">
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $sub->bot }}</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300">${{ $sub->price }}</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $sub->days_left }}</td>
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
                                        <td class="py-2 px-4 text-{{ $color }}-600 {{$color=='gray' ? 'dark:text-gray-500' : ''}} font-semibold">
                                            {{ $sub->status }}</td>
                                        <td class="py-2 px-4 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                            {{ date('M d y', strtotime($sub->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
