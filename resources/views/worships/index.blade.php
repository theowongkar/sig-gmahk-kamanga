<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Ibadah</x-slot>

    {{-- Bagian Ibadah --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Search Form --}}
        <form action="{{ route('worship.index') }}" method="GET" class="mb-6">
            <div class="flex justify-end gap-2">
                <div class="flex-1">
                    <x-forms.select name="category" :options="[
                        'Ibadah Sabat',
                        'Kebaktian Rumah Tangga',
                        'Pernikahan',
                        'Kedukaan',
                        'Ibadah Pemuda Advent',
                        'Ibadah Remaja Advent',
                    ]" :selected="request('category')" />
                </div>
                <x-buttons.primary-button type="submit">
                    Cari
                </x-buttons.primary-button>
            </div>
        </form>

        {{-- Card --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($worships as $worship)
                <x-cards.worship-card :date="$worship->date" :start-time="$worship->start_time" :category="$worship->category" :preacher="$worship->preacher"
                    :mc="$worship->mc" :singers="$worship->singers" :location="$worship->location" />
            @empty
                <p class="text-center col-span-4 text-gray-500">Tidak ada berita terbaru.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $worships->links('vendor.pagination.custom') }}
        </div>
    </section>

</x-guest-layout>
