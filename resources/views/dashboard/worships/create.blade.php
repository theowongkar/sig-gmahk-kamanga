<x-app-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Tambah Data Ibadah</x-slot>

    {{-- Bagian Tambah Ibadah --}}
    <section class="space-y-2">

        {{-- Flash Message --}}
        <x-alerts.flash-message />

        {{-- Form Tambah Ibadah --}}
        <div class="p-4 bg-white rounded-lg border border-gray-300 shadow">
            <form action="{{ route('dashboard.worship.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Data Ibadah --}}
                <div>
                    <h2 class="mb-5 font-semibold text-gray-700">Data Ibadah</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.select name="category" label="Kategori Ibadah" :options="[
                            'Ibadah Sabat',
                            'Kebaktian Rumah Tangga',
                            'Pernikahan',
                            'Kedukaan',
                            'Ibadah Pemuda Advent',
                            'Ibadah Remaja Advent',
                        ]"></x-forms.select>
                        <x-forms.select name="status" label="Status Ibadah" :options="['Diterima', 'Menunggu Persetujuan']"></x-forms.select>
                        <x-forms.select name="preacher_id" label="Pengkhotbah" :options="$congregations->pluck('name', 'id')"></x-forms.select>
                        <x-forms.select name="mc_id" label="MC" :options="$congregations->pluck('name', 'id')"></x-forms.select>
                        <div class="md:col-span-2">
                            <label for="singer_id" class="block mb-1 text-sm font-medium text-gray-700">
                                Singers (opsional, bisa banyak)
                            </label>

                            <select name="singer_id[]" id="singer_id" multiple
                                class="w-full px-3 py-2 text-sm bg-white border rounded-md focus:outline-none focus:ring-1
                                {{ $errors->has('singer_id')
                                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                    : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}">

                                @foreach ($congregations as $congregation)
                                    <option value="{{ $congregation->id }}"
                                        @if (collect(old('singer_id', []))->contains($congregation->id)) selected @endif>
                                        {{ $congregation->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('singer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-forms.input name="location" label="Tempat Ibadah"></x-forms.input>
                        <x-forms.input name="date" label="Tanggal Ibadah" type="date"></x-forms.input>
                        <x-forms.input name="start_time" label="Waktu Mulai" type="time"></x-forms.input>
                        <x-forms.input name="end_time" label="Waktu Selesai" type="time"></x-forms.input>
                    </div>
                </div>

                {{-- Button --}}
                <div class="mt-4 flex justify-end gap-2">
                    <x-buttons.primary-button href="{{ route('dashboard.worship.index') }}"
                        class="bg-gray-600 hover:bg-gray-700">Kembali</x-buttons.primary-button>
                    <x-buttons.primary-button type="submit">Simpan</x-buttons.primary-button>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
