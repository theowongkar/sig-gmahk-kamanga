<x-app-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Tambah Data Jemaat</x-slot>

    {{-- Bagian Tambah Jemaat --}}
    <section class="space-y-2">

        {{-- Flash Message --}}
        <x-alerts.flash-message />

        {{-- Form Tambah Jemaat --}}
        <div class="p-4 bg-white rounded-lg border border-gray-300 shadow">
            <form action="{{ route('dashboard.congregation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Data Jemaat --}}
                <div>
                    <h2 class="mb-5 font-semibold text-gray-700">Data Jemaat</h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.input name="name" label="Nama"></x-forms.input>
                        <x-forms.select name="gender" label="Jenis Kelamin" :options="['Laki-laki', 'Perempuan']"></x-forms.select>
                        <x-forms.select name="position" label="Jabatan" :options="['Pendeta', 'Sekretaris', 'Bendahara', 'Penatua', 'Diaken', 'Anggota']"></x-forms.select>
                        <x-forms.input name="date_of_birth" label="Tanggal Lahir" type="date"></x-forms.input>
                        <x-forms.input name="place_of_birth" label="Tempat Lahir"></x-forms.input>
                        <x-forms.textarea name="address" label="Alamat"></x-forms.textarea>
                    </div>
                </div>

                {{-- Button --}}
                <div class="mt-4 flex justify-end gap-2">
                    <x-buttons.primary-button href="{{ route('dashboard.congregation.index') }}"
                        class="bg-gray-600 hover:bg-gray-700">Kembali</x-buttons.primary-button>
                    <x-buttons.primary-button type="submit">Simpan</x-buttons.primary-button>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
