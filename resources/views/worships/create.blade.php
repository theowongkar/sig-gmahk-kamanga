<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Ibadah</x-slot>

    {{-- Bagian Ibadah --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
            {{-- Flash Message --}}
            <div class="mb-5">
                <x-alerts.flash-message />
            </div>

            {{-- Form Ajukan Ibadah --}}
            <form action="{{ route('worship.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Category Ibadah --}}
                <x-forms.select name="category" label="Kategori Ibadah" :options="[
                    'Ibadah Sabat',
                    'Kebaktian Rumah Tangga',
                    'Pernikahan',
                    'Kedukaan',
                    'Ibadah Pemuda Advent',
                    'Ibadah Remaja Advent',
                ]" :selected="request('category')" />

                {{-- Lokasi --}}
                <div x-data="{
                    congregations: {{ json_encode($congregations) }},
                    selectedAddress: '{{ old('location') }}',
                    isCustom: false
                }" class="space-y-3">
                    {{-- Rumah Keluarga --}}
                    <x-forms.select name="house_of_worship" label="Rumah Keluarga" :options="$congregations->pluck('name', 'id')" :selected="old('house_of_worship', request('house_of_worship'))"
                        x-on:change="
                        if (!isCustom) {
                            let selected = congregations.find(c => c.id == $event.target.value);
                            selectedAddress = selected ? selected.address : '';
                        }
                    " />

                    {{-- Tempat Ibadah --}}
                    <div class="mb-2">
                        <label for="location" class="block mb-1 text-sm font-medium text-gray-700">
                            Tempat Ibadah
                        </label>

                        <input type="text" id="location" name="location" x-model="selectedAddress"
                            x-bind:disabled="!isCustom" x-bind:class="isCustom ? 'bg-white' : 'bg-gray-200'"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition">

                        {{-- Input hidden laravel --}}
                        <input type="hidden" name="location" x-model="selectedAddress">

                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Checkbox untuk custom --}}
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="custom_place" x-model="isCustom" class="mr-2">
                        <label for="custom_place" class="text-sm">Ingin merubah tempat ibadah?</label>
                    </div>
                </div>

                {{-- Tanggal Ibadah --}}
                <x-forms.input type="date" name="date" label="Tanggal Ibadah" required />

                <div class="grid grid-cols-2 gap-4">
                    <x-forms.input type="time" name="start_time" label="Waktu Mulai" required />
                    <x-forms.input type="time" name="end_time" label="Waktu Selesai" required />
                </div>

                {{-- Tombol --}}
                <x-buttons.primary-button type="submit" class="w-full font-semibold">
                    Ajukan Ibadah
                </x-buttons.primary-button>
            </form>
        </div>
    </section>

</x-guest-layout>
