<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Beranda</x-slot>

    {{-- Bagian Banner --}}
    <section class="relative bg-cover bg-center h-72 sm:h-96 flex items-center justify-center px-4"
        style="background-image: url('{{ asset('img/hero-image.webp') }}');">
        <div class="absolute inset-0 bg-[#375E97] opacity-70"></div>
        {{-- Konten --}}
        <div class="relative z-10 text-center text-white max-w-2xl px-4 space-y-2">
            <h1 class="text-md md:text-3xl lg:text-4xl font-bold">Gereja Masehi Advent Hari Ketujuh</h1>
            <p class="text-xs md:text-lg lg:text-xl leading-tight">
                Sejarah dan kepercayaan GMAHK mencerminkan keteguhan umat manusia dalam perjalanan iman mereka.
            </p>
        </div>
    </section>

    {{-- Bagian Pendahuluan --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 pt-15 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Slogan --}}
            <div>
                <h2 class="text-xl md:text-3xl font-bold text-[#375E97] hover:underline">
                    Gereja global yang menguduskan hari ketujuh sebagai hari Sabat.
                </h2>
            </div>
            {{-- Konten --}}
            <div class="space-y-2">
                <p class="text-gray-700 text-xs md:text-lg text-justify indent-7">
                    Didorong oleh kasih Yesus, anggota jemaat di seluruh dunia percaya bahwa menguduskan hari ketujuh
                    adalah perintah Allah yang kekal.
                    Kami menghormati-Nya dengan memelihara hari Sabat sebagai hari perhentian dan penyembahan.
                </p>
                <p class="text-gray-700 text-xs md:text-lg text-justify indent-7">
                    Gereja Masehi Advent Hari Ketujuh (disingkat GMAHK) adalah denominasi Kristen Protestan. Gereja ini
                    berasal dari Gerakan Miller yang muncul di Amerika Serikat pada pertengahan abad 19. Ciri utama
                    Gereja Advent adalah pemeliharaan kekudusan hari Sabat atau Sabtu, hari ketujuh dalam pekan, sebagai
                    hari Sabat.
                </p>
            </div>
        </div>
    </section>

    {{-- Bagian Ibadah --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-[3fr_2fr] bg-[#375E97] rounded-lg overflow-hidden">
            {{-- Gambar --}}
            <div>
                <img src="{{ asset('img/advent-candle.webp') }}" alt="Lilin Advent" class="w-full max-h-80">
            </div>
            {{-- Konten --}}
            <div class="p-5 text-white">
                <h2 class="text-xl md:text-2xl font-bold mb-5 uppercase">Jadwal Ibadah Terbaru</h2>
                <div class="flex gap-4">
                    <div class="flex-1 space-y-2">
                        <div>
                            <h3 class="font-semibold">Pengkhotbah:</h3>
                            <p class="text-gray-100">{{ $worship ? $worship->preacher->name : '...' }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">MC:</h3>
                            <p class="text-gray-100">
                                {{ $worship ? $worship->mc->name : '...' }}
                            </p>
                        </div>
                        <div>
                            <h3 class="font-semibold">Singers:</h3>
                            <p class="text-gray-100">
                                {{ $worship ? $worship->singers->pluck('name')->map(fn($n) => substr($n, 0, 8))->implode(', ') : '...' }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="relative w-36 h-38 bg-gradient-to-r from-[#375E97] to-[#2A4D69] p-2 rounded-xl shadow-lg border border-white/10 text-center">
                        <div class="absolute -top-3 bg-[#FB6542] p-2 rounded-full shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h4 class="mt-6 text-lg font-semibold uppercase">Waktu Mulai</h4>
                        @if ($worship)
                            <p class="flex items-center justify-center gap-1 text-white font-semibold">
                                <span
                                    class="text-5xl font-bold tracking-tighter mr-1">{{ \Carbon\Carbon::parse($worship->date)->format('d') }}</span>
                                <span class="flex flex-col leading-tight items-start">
                                    <span>{{ \Carbon\Carbon::parse($worship->date)->locale('id')->translatedFormat('M') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($worship->date)->format('Y') }}</span>
                                </span>
                            </p>
                            <p class="text-xl font-semibold">
                                {{ \Carbon\Carbon::parse($worship->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($worship->end_time)->format('H:i') }}
                            </p>
                        @else
                            <p class="text-3xl font-bold">...</p>
                            <p class="text-xl font-semibold">... - ...</p>
                        @endif
                    </div>
                </div>
                <a href="#"
                    class="bg-[#FB6542] inline-block mt-4 hover:bg-orange-600 text-white py-1 px-2 rounded-md text-sm">Lihat
                    Jadwal Lainnya...</a>
            </div>
        </div>
    </section>

    {{-- Bagian Berita --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-xl md:text-2xl font-bold mb-5 uppercase text-center">Berita Terbaru</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($posts as $post)
                <x-cards.post-card :title="$post->title" :content="strip_tags($post->content)" :image="$post->image" :views="$post->views"
                    :created-at="$post->created_at->diffForHumans()" />
            @empty
                <p class="text-center col-span-3 text-gray-500">Tidak ada berita terbaru.</p>
            @endforelse

        </div>
    </section>

</x-guest-layout>
