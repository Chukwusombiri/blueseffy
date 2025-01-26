<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">

        <title>{{ config('app.name', 'BLUESTECH') }}</title>

        <!-- Favicon Icon -->
         <link rel="icon" href="{{url('images/favicon.ico')}}">	                    
         <!-- Apple Touch Icons -->        
         <link rel="apple-touch-icon" sizes="180x180" href="{{url('images/apple-touch-icon.png')}}">
         <link rel="icon" type="image/png" sizes="32x32" href="{{url('images/favicon-32x32.png')}}">
         <link rel="icon" type="image/png" sizes="16x16" href="{{url('images/favicon-16x16.png')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">                
        
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">   
        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">         
        @livewireStyles            
        <!-- Alpine v3 -->
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/cdn.min.js"></script>         --}}
            {{-- OR use vite to add alpine --}}
        @vite(['resources/js/app.js'])
    </head>
    <body  class="hold-transition sidebar-mini layout-fixed">
        <main class="wrapper">
            {{$slot}}
        </main>
        
        <!-- jQuery -->
        <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>        
        <!-- Bootstrap 4 -->
        <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>       
        {{-- custom script --}}       
        <script src="{{url('dist/js/myadminscript.js')}}"></script>
        @stack('scripts')    
        @livewire('livewire-ui-modal')
        @livewireScripts        
    </body>
</html>
