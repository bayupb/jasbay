<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="smooth-scroll select-none">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{asset('favicon.svg')}}" type="image/x-icon">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
         {{-- {!! htmlScriptTagJsApi() !!} --}}
        <!-- Scripts -->
        {{-- <link rel="stylesheet" href="{{ asset('css/barber-shop.css')}}"> --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
        @livewireStyles
    </head>

<body class="font-poppins">
    @include('components.front.header')

    {{$slot}}

    @include('components.front.footer')





</body>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

{{-- <script src="{{asset('js/pace.js')}}"></script> --}}
<script src="{{asset('js/flowbite.js')}}"></script>

</html>
