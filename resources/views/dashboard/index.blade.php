<x-app-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Dashboard</x-slot>

    {{-- Bagian Jemaat --}}
    <section class="mb-8">
        <div class="flex justify-center items-center mb-4">
            <h1 class="px-5 py-1 bg-[#375E97] text-white text-center font-bold uppercase rounded">
                Statistik Jemaat
            </h1>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <x-cards.stats-card :count="$congregationsData['total']" title="Total Jemaat" subtitle="Jumlah keseluruhan jemaat"
                color="bg-purple-500" />
            <x-cards.stats-card :count="$congregationsData['active']" title="Jemaat Aktif" subtitle="Jumlah jemaat aktif"
                color="bg-green-500" />
            <x-cards.stats-card :count="$congregationsData['male']" title="Laki-laki" subtitle="Jumlah jemaat laki-laki (aktif)"
                color="bg-blue-500" />
            <x-cards.stats-card :count="$congregationsData['female']" title="Perempuan" subtitle="Jumlah jemaat perempuan (aktif)"
                color="bg-pink-500" />
        </div>
    </section>

    {{-- Bagian Berita --}}
    <section class="mb-8">
        <div class="flex justify-center items-center mb-4">
            <h1 class="px-5 py-1 bg-[#375E97] text-white text-center font-bold uppercase rounded">
                Statistik Berita
            </h1>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <x-cards.stats-card :count="$postsData['total']" title="Total Berita" subtitle="Jumlah keseluruhan berita"
                color="bg-purple-500" />
            <x-cards.stats-card :count="$postsData['published']" title="Berita Terbit" subtitle="Jumlah berita terbit"
                color="bg-green-500" />
            <x-cards.stats-card :count="$postsData['draft']" title="Draf" subtitle="Jumlah berita draf" color="bg-yellow-500" />
            <x-cards.stats-card :count="$postsData['archived']" title="Arsip" subtitle="Jumlah berita arsip" color="bg-blue-500" />
        </div>
    </section>

    {{-- Bagian Ibadah --}}
    <section>
        <div class="flex justify-center items-center mb-4">
            <h1 class="px-5 py-1 bg-[#375E97] text-white text-center font-bold uppercase rounded">
                Statistik Ibadah
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-cards.stats-card :count="$worshipData['total']" title="Total Ibadah" subtitle="Jumlah keseluruhan ibadah"
                color="bg-purple-500" />

            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow overflow-hidden hover:scale-105 transition">
                    <div class="bg-red-500">
                        <h2 class="px-4 py-2 text-white text-sm">Ibadah Terdekat</h2>
                    </div>
                    <div class="px-4 py-2">
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
                            <h3 class="text-lg font-medium">
                                {{ $worshipData['latest']->category ?? 'Belum ada ibadah terbaru' }}
                            </h3>
                            <p>Tanggal: <span
                                    class="text-gray-600">{{ \Carbon\Carbon::parse($worshipData['latest']->date)->translatedFormat('j F Y') ?? 'Belum ada' }}
                                    -
                                    {{ \Carbon\Carbon::parse($worshipData['latest']->start_time)->format('H:i') ?? '' }}</span>
                            </p>
                        </div>
                        <p>Khadim: <span class="text-gray-600">{{ $worshipData['latest']->preacher->name ?? '' }}</span>
                        </p>
                        <p>Lokasi: <span class="text-gray-600">{{ $worshipData['latest']->location ?? '' }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
