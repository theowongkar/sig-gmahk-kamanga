@php
    $navLinks = [
        ['name' => 'Beranda', 'route' => route('home')],
        ['name' => 'Tentang Kami', 'route' => route('about')],
        ['name' => 'Berita', 'route' => route('post.index')],
        ['name' => 'Ibadah', 'route' => route('worship.index')],
    ];
@endphp

<div x-data="{ open: false }" class="bg-[#375E97] shadow">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        {{-- Logo --}}
        <div class="flex items-center gap-x-2">
            <div class="bg-white p-1 rounded-xs">
                <img src="{{ asset('img/application-logo.svg') }}" alt="Logo" class="w-8 h-8">
            </div>
            <div>
                <h1 class="text-white text-sm font-semibold tracking-wide leading-none">
                    <span class="block">Gereja Masehi Advent</span>
                    <span class="block">Hari Ketujuh di Indonesia</span>
                </h1>
                <p class="text-white text-xs leading-none">Jemaat Kamanga Tompaso | Minahasa</p>
            </div>
        </div>

        {{-- Menu Desktop --}}
        <nav class="hidden lg:flex gap-x-4 text-white font-medium">
            @foreach ($navLinks as $navLink)
                <a href="{{ $navLink['route'] }}"
                    class="hover:underline underline-offset-2 {{ url()->current() === $navLink['route'] ? 'animate-pulse' : '' }}">{{ $navLink['name'] }}</a>
            @endforeach
        </nav>

        {{-- Tombol Desktop --}}
        <div class="hidden lg:flex gap-x-2">
            <a href="{{ route('worship.create') }}"
                class="px-3 py-2 bg-[#FFBB00] text-white font-semibold rounded-md cursor-pointer hover:bg-yellow-500">Ajukan
                Ibadah</a>
            <a href="/"
                class="px-3 py-2 bg-[#FB6542] text-white font-semibold rounded-md cursor-pointer hover:bg-orange-600">Login</a>
        </div>

        {{-- Tombol Hamburger (mobile only) --}}
        <button @click="open = !open"
            class="lg:hidden text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Menu Mobile --}}
    <div x-show="open" class="lg:hidden px-4 pb-3 space-y-2 text-white font-medium">
        @foreach ($navLinks as $navLink)
            <a href="{{ $navLink['route'] }}"
                class="block hover:underline underline-offset-2 {{ url()->current() === $navLink['route'] ? 'animate-pulse' : '' }}">{{ $navLink['name'] }}</a>
        @endforeach
        <div class="pt-2 space-y-2">
            <a href="{{ route('worship.create') }}"
                class="block w-full text-center px-3 py-2 bg-[#FFBB00] text-white font-semibold rounded-md hover:bg-yellow-500">Ajukan
                Ibadah</a>
            <a href="/"
                class="block w-full text-center px-3 py-2 bg-[#FB6542] text-white font-semibold rounded-md hover:bg-orange-600">Login</a>
        </div>
    </div>
</div>
