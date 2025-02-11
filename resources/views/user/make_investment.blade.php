<x-app-layout>
    <section class="bg-cover bg-center" style="background-image: url('/images/page-header.jpg')">
        <div class="bg-gray-900 bg-opacity-50 backdrop-blur-sm py-12">
            <div class="max-w-6xl mx-auto px-6 md:px-10 border-b flex flex-col gap-4">                                  
                <h2 class="text-2xl font-semibold text-white capitalize">                           
                    investment                         
                </h2>
                <div class="text-white text-sm font-medium">
                    <p class="mb-1">Portfolio funding using crytocurrency</p>
                    <p class="mb-1">Last Login: {{ date('M d, y', strtotime($user->last_sign_in_at)) }}</p>  
                    <p class="uppercase font-semibold mb-4 flex items-center text-sm"> 
                        <span>Status:</span>
                        <span
                            class="ml-3 py-1 px-4 md:px-6 md:py-2 rounded-full bg-indigo-600 dark:bg-blue-500 text-xs">
                            @if ($user->is_paused)
                                {{ 'ACCOUNT SUSPENDED' }}
                            @else
                                @switch($user->status)
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
    <section class="relative py-20">
        @livewire('user.make-investment', ['plan' => $plan, 'wallets' => $wallets, 'user' => $user], key($user->id))
    </section>
    <x-coin-vendors />
</x-app-layout>

<script>
    window.addEventListener('swal', function(e) {
        Swal.fire({
            icon: e.detail.icon,
            title: e.detail.title,
            html: e.detail.html,
        });
    })
</script>
