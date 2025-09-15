@php
    $navLinks = [
        ['name' => 'Beranda', 'route' => route('home')],
        ['name' => 'Tentang Kami', 'route' => route('about')],
        ['name' => 'Berita', 'route' => route('post.index')],
        ['name' => 'Ibadah', 'route' => route('worship.index')],
    ];
@endphp

<footer class="bg-[#375E97] shadow">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Kolom Logo & Instansi --}}
        <div>
            <div class="flex flex-col gap-2">
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
                <p class="text-base text-gray-200 mt-2 max-w-xs">Website Gereja Masehi Advent Hari Ketujuh (GMAHK)
                    Kamanga,
                    Sulawesi Utara. Dirancang khusus untuk sistem informasi gereja.</p>
            </div>
        </div>

        {{-- Kolom Tautan Penting --}}
        <div>
            <h2 class="text-white text-lg font-semibold mb-3">Tautan Penting</h2>
            <ul class="space-y-2 text-base">
                @foreach ($navLinks as $navLink)
                    <li><a href="{{ $navLink['route'] }}"
                            class="text-white hover:text-gray-200">{{ $navLink['name'] }}</a></li>
                @endforeach
            </ul>
        </div>

        {{-- Kolom Kontak --}}
        <div>
            <h2 class="text-white text-lg font-semibold mb-3">Kontak</h2>
            <ul class="space-y-1 text-white text-base">
                <li>Website: <a href="https://www.sdaeiuc.org" class="text-gray-200 hover:underline">www.sdaeiuc.org</a>
                <li>Telepon: <a href="tel:+62 431-843333" class="text-gray-200 hover:underline">+62 431-843333</a></li>
                <li>Alamat: <span class="text-gray-200">Jl. Pemuda No.46, Minahasa, Sulawesi Utara.</span></li>
                </li>
                <li>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9769530736594!2d124.81191849999999!3d1.1766884999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328747d36de8dbb5%3A0x7336c9495113127d!2sGMAHK%20KAMANGA%20JEMAAT%20PIONEER!5e0!3m2!1sid!2sid!4v1732087480369!5m2!1sid!2sid"
                        height="100" allowfullscreen="yes" loading="eager" referrerpolicy="no-referrer-when-downgrade"
                        aria-label="Google Maps Advent Kamanga" class="w-full mt-2 rounded-lg border-0"></iframe>
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-white/10 mt-5">
        <div class="container mx-auto px-4 py-4 text-xs text-center text-gray-300">
            &copy; {{ date('Y') }} GMAHK Kamanga, Minahasa, Sulawesi Utara.
            All rights reserved.
        </div>
    </div>
</footer>
