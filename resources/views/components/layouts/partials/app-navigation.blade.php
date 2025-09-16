@php
    $navLinks = [
        ['name' => 'Dashboard', 'route' => route('dashboard'), 'active' => request()->routeIs('dashboard')],
        [
            'name' => 'Data Jemaat',
            'route' => route('dashboard.congregation.index'),
            'active' => request()->routeIs('dashboard.congregation.*'),
        ],
        [
            'name' => 'Berita',
            'route' => route('dashboard.post.index'),
            'active' => request()->routeIs('dashboard.post.*'),
        ],
        [
            'name' => 'Data Ibadah',
            'route' => route('dashboard.worship.index'),
            'active' => request()->routeIs('dashboard.worship.*'),
        ],
        [
            'name' => 'Pengajuan Ibadah',
            'route' => route('dashboard.request-worship.index'),
            'active' => request()->routeIs('dashboard.request-worship.*'),
        ],
    ];
@endphp

<div x-show="sidebarOpen" @click="sidebarOpen = false"
    class="fixed inset-0 bg-black/50 z-20 transition-opacity scrollbar-custom md:hidden"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
</div>

{{-- Sidebar Utama --}}
<div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 transform bg-[#375E97] text-white transition duration-300 md:translate-x-0 md:static md:inset-0 flex flex-col">

    {{-- Header Sidebar --}}
    <div class="flex items-center space-x-3 px-4 py-4">
        {{-- Logo Gambar --}}
        <img src="{{ asset('img/application-logo.svg') }}" alt="Logo Pemprov Sulut"
            class="w-12 h-12 object-contain p-1 bg-white rounded">

        {{-- Tulisan --}}
        <div class="leading-none">
            <h2 class="text-lg font-bold leading-none">GMAHK KAMANGA</h2>
            <span class="block text-gray-100 text-sm">Sulawesi Utara</span>
        </div>
    </div>

    {{-- Navigasi Menu --}}
    <nav class="flex-1 overflow-y-auto px-4 space-y-3">
        {{-- Menu --}}
        <div>
            <h1 class="mb-1 text-xs text-gray-200 font-bold uppercase">MENU :</h1>
            @foreach ($navLinks as $navLink)
                <a href="{{ $navLink['route'] }}"
                    class="flex px-4 py-2 text-white text-sm font-semibold rounded {{ $navLink['active'] ? 'bg-blue-500' : 'hover:bg-blue-400' }}">
                    <span>{{ $navLink['name'] }}</span>
                </a>
            @endforeach
        </div>

        <div>
            <h1 class="mb-1 text-xs text-gray-200 font-bold uppercase">LAINNYA :</h1>
            <a href="{{ route('home') }}"
                class="flex px-4 py-2 text-white text-sm font-semibold rounded {{ url()->current() === route('home') ? 'bg-blue-500' : 'hover:bg-blue-400' }}">
                <span>Beranda</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left flex px-4 py-2 text-white text-sm font-semibold rounded cursor-pointer hover:bg-blue-400">
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </nav>
</div>
