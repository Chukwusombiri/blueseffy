<div class="overflow-x-auto mt-4">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Deposit History</h2>
    <p class="mb-2 font-semibold text-md max-w-2xl px-2">Speed up the process of investment request approval by uploading a screenshot of the payment into the provided wallet address.</p>
    <table class="w-full table-auto text-left">
        <thead>
            <tr class="border-b border-gray-300">
                <th class="py-2 px-4 font-bold text-gray-700">Deposit Date</th>
                <th class="py-2 px-4 font-bold text-gray-700">Deposit On</th>
                <th class="py-2 px-4 font-bold text-gray-700">Amount Deposited</th>
                <th class="py-2 px-4 font-bold text-gray-700">Status</th>
                <th class="py-2 px-4 font-bold text-gray-700">Receipt</th>
            </tr>
        </thead>
        <tbody>
           @if (count($deposits)>0)
                @foreach ($deposits as $deposit)
                <tr class="border-b border-gray-300">
                    <td class="py-2 px-4 text-gray-700">{{date('M d, Y', strtotime($deposit->created_at))}}</td>
                    <td class="py-2 px-4 text-gray-700">{{$deposit->wallet->name}}</td>
                    <td class="py-2 px-4 text-gray-700">${{$deposit->amount}}</td>
                    
                        @if ($deposit->is_approved)
                        <td class="py-2 px-4 text-green-600 font-bold">
                            Approved
                        </td>
                        @else
                        <td class="py-2 px-4 text-yellow-600 font-bold">
                            Pending
                        </td>
                        @endif
                    
                    <td class="py-2 px-4 font-bold whitespace-nowrap">
                        @if ($deposit->receipt != null)
                            <a href="{{ asset('storage/'.$deposit->receipt) }}" target="_blank" class="px-2 py-2 bg-gray-800 hover:bg-opacity-50 text-white shadow rounded">view receipt</a>
                        @else
                            <button wire:click.prevent='$emit("openModal","user.user-deposit-receipt",@json([$deposit->id]))' class="px-2 py-2 bg-slate-500 hover:bg-opacity-50 text-gray-800 shadow rounded">upload receipt</button>
                        @endif
                    </td>
                </tr>
                @endforeach
           @endif                              
        </tbody>
    </table>

    {{-- paginator --}}    
    <div class="w-full mt-4">
        <ul class="flex justify-center">
            <li>
                <button class="px-4 py-2 bg-red-200 text-gray-600 border rounded-l-md disabled:opacity-50" 
                        wire:click="previousPage" 
                        {{ $deposits->previousPageUrl() ? '' : 'disabled' }}>
                    Previous
                </button>
            </li>
    
            @foreach ($deposits->links() as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 bg-gray-200 text-gray-600 border">{{ $element }}</span>
                    </li>
                @endif
    
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            <button class="{{ $page == $deposits->currentPage() ? 'px-4 py-2 bg-blue-500 text-white border' : 'px-4 py-2 bg-gray-200 text-gray-600 border' }}"
                                    wire:click="gotoPage({{ $page }})">
                                {{ $page }}
                            </button>
                        </li>
                    @endforeach
                @endif
            @endforeach
    
            <li>
                <button class="px-4 py-2 bg-red-200 text-gray-600 border rounded-r-md disabled:opacity-50" 
                        wire:click="nextPage" 
                        {{ $deposits->nextPageUrl() ? '' : 'disabled' }}>
                    Next
                </button>
            </li>
        </ul>
    </div>
</div>