<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Tentang Kami</x-slot>

    {{-- Bagian Banner --}}
    <section class="relative bg-cover bg-center h-72 sm:h-96 flex items-center justify-center px-4"
        style="background-image: url('{{ asset('img/hero-image.webp') }}');">
        <div class="absolute inset-0 bg-[#375E97] opacity-70"></div>
        {{-- Konten --}}
        <div class="relative z-10 text-center text-white max-w-2xl px-4 space-y-2">
            <h1 class="text-md md:text-3xl lg:text-4xl font-bold">Selamat Datang di GMAHK Kamanga</h1>
            <p class="text-xs md:text-lg lg:text-xl leading-tight">
                Temukan iman, kasih, dan kedamaian bersama kami.
            </p>
        </div>
    </section>

    {{-- Bagian Tentang Kami --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col lg:flex-row items-center lg:gap-12">
            {{-- Gambar --}}
            <div class="lg:w-1/2">
                <img src="{{ asset('img/hero-image.webp') }}" alt="Gereja Advent Kamanga"
                    class="w-full aspect-video rounded-lg shadow-lg transition-transform hover:scale-105">
            </div>
            {{-- Konten --}}
            <div class="lg:w-1/2 space-y-5">
                <h2 class="text-xl md:text-3xl font-bold text-[#375E97]">Tentang Kami</h2>
                <p class="text-gray-700 text-xs md:text-lg text-justify indent-7">
                    Kami adalah komunitas yang berfokus pada iman dan pelayanan kepada sesama. Melalui ajaran Yesus,
                    kami bersama-sama mengejar tujuan hidup yang lebih bermakna dan harmonis.
                </p>
                <p class="text-gray-700 text-xs md:text-lg text-justify indent-7">
                    Setiap minggu, kami mengadakan kebaktian, kelas Alkitab, dan berbagai kegiatan sosial yang
                    memperkuat iman serta kebersamaan. Mari bersama-sama menjalin hubungan yang lebih dekat dengan Tuhan
                    dan mempererat ikatan persaudaraan dalam komunitas.
                </p>
                <x-buttons.primary-button href="https://www.sdaeiuc.org/daerah-konferens-manado-dan-maluku-utara"
                    target="_blank" class="mt-6">
                    Pelajari Lebih Lanjut
                </x-buttons.primary-button>
            </div>
        </div>
    </section>

    {{-- Bagian Visi dan Misi Kami --}}
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 text-center">
            <h2 class="mb-5 text-xl md:text-3xl text-[#375E97] font-bold">Visi dan Misi</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                {{-- Card 1 --}}
                <div
                    class="bg-white rounded-lg shadow-lg p-6 hover:scale-105 transition-transform duration-300 max-w-md mx-auto">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-12 text-green-700">
                            <path
                                d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold">Iman</h3>
                    <p class="mt-2 text-gray-700 leading-relaxed">Kami memegang teguh Firman Tuhan sebagai panduan hidup
                        yang benar.</p>
                </div>
                {{-- Card 2 --}}
                <div
                    class="bg-white rounded-lg shadow-lg p-6 hover:scale-105 transition-transform duration-300 max-w-md mx-auto">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-12 text-red-700">
                            <path
                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold">Kasih</h3>
                    <p class="mt-2 text-gray-700 leading-relaxed">Mengasihi sesama seperti Yesus mengasihi kita semua.
                    </p>
                </div>
                {{-- Card 3 --}}
                <div
                    class="bg-white rounded-lg shadow-lg p-6 hover:scale-105 transition-transform duration-300 max-w-md mx-auto">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-12 text-blue-700">
                            <path fill-rule="evenodd"
                                d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold">Pelayanan</h3>
                    <p class="mt-2 text-gray-700 leading-relaxed">Berusaha menjadi berkat bagi sesama melalui pelayanan.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
