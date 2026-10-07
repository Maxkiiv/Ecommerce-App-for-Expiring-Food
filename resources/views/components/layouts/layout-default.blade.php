<!DOCTYPE html>
<html data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="icon" href="{{ asset('favicon.ico') }}" />
    <title>{{ config('appsettings.store_name') }}</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <x-UI.bootstrap5 /> --}}
    {{-- <x-UI.fontawesome /> --}}
    <x-ui.imports.swiper />


    {{-- Custom Colors --}}
    {{--
    <link rel="stylesheet" href="{{ asset('template_default/assets/css/custom-colors.css') }}"> --}}
    @livewireStyles
</head>

<body class="bg-white-100 min-h-screen flex flex-col">


    {{-- NAVBAR STARTS --}}
    <x-structure.navbars.basic />

    {{-- MAIN STARTS --}}
    <main class="flex-1">
        {{ $slot }}
    </main>
    {{-- MAIN ENDS --}}

    {{-- FOOTER STARTS --}}
    <x-structure.footers.basic />
    {{-- FOOTER ENDS --}}

    {{-- Scripts STARTS --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    {{-- <script src="{{ asset('template_default/assets/js/script.js') }}"></script> --}}
    {{-- Scripts ENDS --}}


</body>

</html>
