<div class="bg-white dark:bg-gray-800">
    <div class="overflow-x-auto">
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="border-0 border-b border-gray-300 dark:border-gray-700">
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Investment Date</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Investment Package</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Amount Invested</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Status</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($investments) > 0)
                    @foreach ($investments as $investment)
                        <tr
                            class="border-0 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900">
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">
                                {{ date('M d, Y', strtotime($investment->created_at)) }}</td>
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">{{ $investment->plan->name }}</td>
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">${{ $investment->amount }}</td>
                            @if ($investment->is_approved)
                                <td class="py-2 px-4 text-green-600 dark:text-green-500 font-semibold text-xs">
                                    Approved
                                </td>
                            @else
                                <td class="py-2 px-4 text-yellow-600 dark:text-yellow-500 font-semibold text-xs">
                                    Pending
                                </td>
                            @endif
                            <td class="py-2 px-4 whitespace-nowrap">
                                @if ($investment->receipt != null)
                                    <a href="{{ asset('storage/' . $investment->receipt) }}" target="_blank"
                                        class="text-blue-600 underline text-sm">view
                                        receipt</a>
                                @else
                                    <button
                                        wire:click.prevent="$emit('openModal','user.user-receipt', {{ json_encode(['id' => $investment->id]) }} )"
                                        class="text-blue-600 underline text-sm outline-none cursor-pointer">upload
                                        receipt</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{-- paginator --}}
    <div class="w-full p-4">
        {{$investments->links()}}
    </div>
</div>
