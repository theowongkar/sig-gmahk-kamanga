<header class="flex items-center justify-between px-5 py-3 bg-white shadow-xl">

    {{-- Judul Halaman --}}
    <div class="flex items-center space-x-4">
        <button class="md:hidden" @click="sidebarOpen = true" aria-label="Toggle Sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
        <h1 class="text-gray-800 font-semibold line-clamp-1">{{ $title ?? 'Dashboard' }}</h1>
    </div>

    {{-- Dropdown User --}}
    <div x-data="{ open: false }" class="relative flex items-center space-x-2 cursor-pointer group"
        @click="open = !open">
        <div class="hidden md:flex flex-col text-sm text-gray-800 leading-none text-right">
            <span class="font-medium">{{ Str::limit(Auth::user()->name, 15, '...') }}</span>
            <span class="text-xs text-gray-700">{{ Auth::user()->role }}</span>
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-down-short w-5 h-5 group-hover:text-blue-600 transition-colors duration-200"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
            </svg>
        </div>

        {{-- Dropdown Menu --}}
        <div x-show="open" @click.outside="open = false" x-transition
            class="absolute right-0 top-full mt-2 w-44 bg-white rounded-md border border-gray-300 shadow z-50 text-sm overflow-hidden">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                Beranda
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-gray-700 cursor-pointer hover:text-red-100 hover:bg-red-500">
                    Logout
                </button>
            </form>
        </div>
    </div>

</header>
