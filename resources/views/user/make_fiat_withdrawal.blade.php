<x-app-layout>
    <section class="relative pt-14 pb-20 bg-white dark:bg-gray-800">                   
        @livewire('user.make-fiat-withdrawal')               
    </section>
    </x-app-layout>
    <script>      
        Livewire.on('swalwit',(e)=>{
            Swal.fire({                
                icon: 'success',
                title: 'Transaction Successful',
                html: '<p>Withdrawal is been previewed and will be released shortly into your designated Bank Account. <br>Transaction fees may apply.</p>',                
            });
        })
    </script>            