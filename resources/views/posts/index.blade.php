<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Berita</x-slot>

    {{-- Bagian Berita --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Search Form --}}
        <form action="{{ route('post.index') }}" method="GET" class="mb-6">
            <div class="flex justify-end gap-2">
                <div class="flex-1">
                    <x-forms.input type="text" name="search" placeholder="Cari berita..."
                        value="{{ request('search') }}" class="w-full" />
                </div>
                <x-buttons.primary-button type="submit">
                    Cari
                </x-buttons.primary-button>
            </div>
        </form>

        {{-- Card --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($posts as $post)
                <x-cards.post-card :title="$post->title" :content="strip_tags($post->content)" :image="$post->image" :views="$post->views"
                    :created-at="$post->created_at->diffForHumans()" :url="route('post.show', $post->slug)" />
            @empty
                <p class="text-center col-span-4 text-gray-500">Tidak ada berita terbaru.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $posts->links('vendor.pagination.custom') }}
        </div>
    </section>

</x-guest-layout>
