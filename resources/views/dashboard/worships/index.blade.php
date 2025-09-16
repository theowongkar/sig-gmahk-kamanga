<x-app-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Data Ibadah</x-slot>

    {{-- Bagian Ibadah --}}
    <section class="space-y-2">

        {{-- Header --}}
        <div class="bg-gray-50 rounded-lg border border-gray-300 shadow">
            <div class="p-2 space-y-2">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                    {{-- Tombol Tambah --}}
                    <x-buttons.primary-button href="{{ route('dashboard.worship.create') }}"
                        class="w-full lg:w-auto text-center bg-green-600 hover:bg-green-700">
                        Tambah
                    </x-buttons.primary-button>

                    {{-- Form Filter & Search --}}
                    <form method="GET" action="{{ route('dashboard.worship.index') }}"
                        class="w-full flex justify-end gap-1" x-data="{ openFilter: '' }">
                        {{-- Filter: Tanggal Mulai --}}
                        <div class="relative">
                            <button type="button"
                                @click="requestAnimationFrame(() => openFilter = openFilter === 'start_date' ? '' : 'start_date')"
                                class="cursor-pointer bg-white border border-gray-300 rounded-md p-2 hover:ring-1 hover:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-calendar-check size-5" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </button>
                            <div x-show="openFilter === 'start_date'" @click.away="openFilter = ''" x-transition
                                class="absolute z-10 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg p-3">
                                <label class="block text-xs text-gray-500 mb-1">Tanggal Mulai</label>
                                <input type="date" name="start_date" value="{{ request('start_date') }}"
                                    x-on:input.debounce.500ms="$root.submit()"
                                    class="block w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                        </div>

                        {{-- Filter: Tanggal Selesai --}}
                        <div class="relative">
                            <button type="button"
                                @click="requestAnimationFrame(() => openFilter = openFilter === 'end_date' ? '' : 'end_date')"
                                class="cursor-pointer bg-white border border-gray-300 rounded-md p-2 hover:ring-1 hover:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-calendar-x size-5" viewBox="0 0 16 16">
                                    <path
                                        d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </button>
                            <div x-show="openFilter === 'end_date'" @click.away="openFilter = ''" x-transition
                                class="absolute z-10 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg p-3">
                                <label class="block text-xs text-gray-500 mb-1">Tanggal Selesai</label>
                                <input type="date" name="end_date" value="{{ request('end_date') }}"
                                    x-on:input.debounce.500ms="$root.submit()"
                                    class="block w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                        </div>

                        {{-- Input Category --}}
                        <div class="w-full lg:w-80">
                            <x-forms.select name="category" :options="[
                                'Ibadah Sabat',
                                'Kebaktian Rumah Tangga',
                                'Pernikahan',
                                'Kedukaan',
                                'Ibadah Pemuda Advent',
                                'Ibadah Remaja Advent',
                            ]" :selected="request('category')"
                                x-on:input.debounce.500ms="$root.submit()" />
                        </div>
                    </form>
                </div>

                {{-- Pagination --}}
                <div class="overflow-x-auto">
                    {{ $worships->withQueryString()->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>

        {{-- Flash Message --}}
        <x-alerts.flash-message />

        {{-- Table --}}
        <div class="bg-white rounded-lg border border-gray-300 shadow overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[#375E97] text-gray-50">
                    <tr>
                        <th class="p-2 font-normal text-center border-r border-gray-600">#</th>
                        <th class="p-2 font-normal text-left border-r border-gray-600">Kategori</th>
                        <th class="p-2 font-normal text-left border-r border-gray-600">Pengkhotbah</th>
                        <th class="p-2 font-normal text-left border-r border-gray-600">Tempat</th>
                        <th class="p-2 font-normal text-center border-r border-gray-600">Waktu Mulai</th>
                        <th class="p-2 font-normal text-center border-r border-gray-600">Status</th>
                        <th class="p-2 font-normal text-center border-r border-gray-600">Dibuat</th>
                        <th class="p-2 font-normal text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @forelse($worships as $worship)
                        <tr class="hover:bg-blue-50">
                            <td class="p-2 text-center border-r border-gray-300">
                                {{ ($worships->currentPage() - 1) * $worships->perPage() + $loop->iteration }}
                            </td>
                            <td class="p-2 border-r border-gray-300 whitespace-nowrap">{{ $worship->category }}</td>
                            <td class="p-2 border-r border-gray-300 whitespace-nowrap">{{ $worship->preacher->name }}
                            </td>
                            <td class="p-2 border-r border-gray-300 whitespace-nowrap">
                                {{ Str::limit($worship->location, 20) }}</td>
                            <td class="p-2 text-center border-r border-gray-300 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($worship->date)->translatedFormat('d M Y') }}
                                - {{ \Carbon\Carbon::parse($worship->start_time)->translatedFormat('H:i') }}</td>
                            <td class="p-2 text-center border-r border-gray-300">
                                @php
                                    $status = $worship->status;
                                    $colors = [
                                        'Diterima' => 'bg-green-200 text-green-800 border border-green-400',
                                        'Menunggu Persetujuan' =>
                                            'bg-yellow-200 text-yellow-800 border border-yellow-400',
                                    ];
                                @endphp

                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium whitespace-nowrap {{ $colors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="p-2 text-center border-r border-gray-300 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($worship->created_at)->format('d/m/Y H:i') }}
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('dashboard.worship.edit', $worship->id) }}"
                                        class="text-yellow-600 hover:underline text-sm">Edit</a>
                                    <form action="{{ route('dashboard.worship.destroy', $worship->id) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="text-red-600 hover:underline text-sm cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500">Tidak ada data Ibadah</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>
