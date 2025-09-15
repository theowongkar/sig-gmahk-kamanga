<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/application-logo.svg') }}" type="image/x-icon">

    {{-- Judul Halaman --}}
    <title>{{ $status_code }} – {{ $title }}</title>

    {{-- Framework Frontend --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-{{ $bg_color }}-50 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-{{ $text_color }}-600">{{ $status_code }}</h1>
        <p class="text-xl mt-4 text-{{ $text_color }}-800">{{ $message }}</p>


        <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}"
            class="mt-6 inline-block bg-{{ $text_color }}-600 text-white px-6 py-2 rounded">
            Kembali
        </a>
    </div>

</body>

</html>
