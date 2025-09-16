<x-app-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Tambah Data Berita</x-slot>

    {{-- Script Tambahan --}}
    @push('scripts')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    @endpush

    {{-- Bagian Tambah Berita --}}
    <section class="space-y-2">

        {{-- Flash Message --}}
        <x-alerts.flash-message />

        {{-- Form Tambah Berita --}}
        <div class="p-4 bg-white rounded-lg border border-gray-300 shadow">
            <form action="{{ route('dashboard.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Data Berita --}}
                <div>
                    <h2 class="mb-5 font-semibold text-gray-700">Data Berita</h2>

                    <div class="flex flex-col gap-4">
                        <div x-data="{
                            fileUrl: '',
                            handleFile(e) {
                                const file = e.target.files[0];
                                if (!file) return;
                                this.fileUrl = URL.createObjectURL(file);
                            },
                            removeFile() {
                                this.fileUrl = '';
                                $refs.fileInput.value = '';
                            }
                        }">
                            <label for="image" class="block mb-1 text-sm font-medium text-gray-700">Thumbnail
                                Berita</label>
                            <div class="relative flex items-center justify-center border-2 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 border-blue-300 overflow-hidden"
                                @click="$refs.fileInput.click()">
                                <input type="file" id="image" name="image" accept="image/png,image/jpeg"
                                    class="hidden" x-ref="fileInput" @change="handleFile">
                                <div x-show="fileUrl" class="w-full max-h-56 overflow-auto bg-white">
                                    <img :src="fileUrl" alt="Preview" class="w-full h-auto">
                                </div>
                                <div x-show="!fileUrl" class="flex flex-col items-center justify-center py-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="mb-2 text-blue-500 w-6 h-6" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                    </svg>
                                    <span class="text-sm text-blue-600 font-medium">Upload File</span>
                                    <span class="text-xs text-gray-600">Format: JPG, JPEG, PNG. Max 2MB.</span>
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            <div x-show="fileUrl" class="flex justify-center mt-2">
                                <button @click="removeFile" type="button"
                                    class="px-2 py-1 bg-red-600 text-white text-sm rounded-md cursor-pointer hover:bg-red-700">
                                    Hapus
                                </button>
                            </div>

                            <div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <x-forms.input name="title" label="Judul Berita"></x-forms.input>
                        <x-forms.select name="status" label="Status Berita" :options="['Draf', 'Terbit', 'Arsip']"></x-forms.select>

                        <div>
                            <label for="content" class="block mb-1 text-sm font-medium text-gray-700">
                                Konten Berita
                            </label>
                            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                            <trix-editor input="content"></trix-editor>
                        </div>
                    </div>
                </div>

                {{-- Button --}}
                <div class="mt-4 flex justify-end gap-2">
                    <x-buttons.primary-button href="{{ route('dashboard.post.index') }}"
                        class="bg-gray-600 hover:bg-gray-700">Kembali</x-buttons.primary-button>
                    <x-buttons.primary-button type="submit">Simpan</x-buttons.primary-button>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
