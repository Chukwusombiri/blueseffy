<div class="w-full md:w-[80%]" wire:poll.visible>
    <p class="uppercase font-semibold">Investment Progress: {{$percent}}%</p>
    <div class="relative h-[20px] bg-gray-100">
        <div class="absolute left-0 top-0 h-[100%] px-2" style="width:{{$percent}}%; background-color:green;"></div>    
    </div>                
</div>