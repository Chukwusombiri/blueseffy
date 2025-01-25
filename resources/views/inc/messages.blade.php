@if (session('success'))
    <div class="block bg-green-100 mx-2 p-2 rounded-md">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="block bg-red-100 mx-2 p-2 rounded-md">
        {{session('error')}}
    </div>
@endif