<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Lihat Berita</x-slot>

    {{-- Bagian Berita --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
            {{-- Gambar --}}
            <div class="relative w-full border rounded-lg">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('img/placeholder-image.webp') }}"
                    alt="Gambar {{ $post->title }}" class="w-full h-64 object-cover rounded-lg">
                <span class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-lg shadow-md">
                    {{ $post->views }}x dilihat
                </span>
            </div>

            {{-- Konten --}}
            <h1 class="mt-5 text-3xl font-bold">{{ $post->title }}</h1>
            <p class="text-gray-500 text-sm mt-2">
                Dipublikasikan pada
                <time datetime="{{ $post->created_at->toDateString() }}">
                    {{ $post->created_at->format('d M Y') }}
                </time>
                - {{ $post->created_at->diffForHumans() }}
            </p>

            <p class="my-4 prose max-w-none">
                {!! $post->content !!}
            </p>

            {{-- Tombol Kembali --}}
            <div class="mt-5">
                <x-buttons.primary-button href="{{ route('post.index') }}">
                    Kembali ke daftar berita
                </x-buttons.primary-button>
            </div>
        </div>
    </section>

</x-guest-layout>
