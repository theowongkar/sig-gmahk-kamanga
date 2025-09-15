<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Metadata --}}
    <meta name="description"
        content="Website Gereja Masehi Advent Hari Ketujuh (GMAHK), Kamanga, Sulawesi Utara. Dirancang khusus untuk sistem informasi gereja.">
    <meta name="keywords" content="SIG GMAHK Kamanga, sistem informasi gereja, layanan gereja">
    <meta name="author" content="GMAHK Kamanga">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="GMAHK - {{ $title }}">
    <meta property="og:description"
        content="Website Gereja Masehi Advent Hari Ketujuh (GMAHK) Kamanga, Sulawesi Utara.">
    <meta property="og:image" content="{{ asset('img/hero-image.webp') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/application-logo.svg') }}" type="image/x-icon">

    {{-- Judul Halaman --}}
    <title>GMAHK Kamanga</title>

    {{-- Framework Frontend --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Script Tambahan --}}
    @stack('scripts')

    {{-- Default CSS --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased">

    <div class="flex flex-col min-h-screen">
        {{-- Navigasi --}}
        @include('components.layouts.partials.guest-navigation')

        {{-- Layout Utama --}}
        <main class="flex-1 bg-gray-50">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        @include('components.layouts.partials.guest-footer')
    </div>

</body>

</html>
