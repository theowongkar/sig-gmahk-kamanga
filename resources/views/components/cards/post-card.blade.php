@props(['title', 'content', 'image' => null, 'views' => 0, 'createdAt' => null, 'url' => '#'])

<div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
    {{-- Thumbnail --}}
    <div class="relative w-full aspect-video">
        <img src="{{ $image ? asset('storage/' . $image) : asset('img/placeholder-image.webp') }}"
            alt="{{ $title }}" class="w-full h-full object-cover">

        <span class="absolute top-3 right-3 bg-gray-700 px-2 py-0.5 text-sm text-white rounded">
            {{ $views }}x dilihat
        </span>
    </div>

    {{-- Content --}}
    <div class="flex flex-col flex-1 p-5">
        <div class="flex-1 space-y-1 mb-4">
            <p class="text-sm text-gray-600">{{ $createdAt }}</p>
            <h2 class="font-semibold line-clamp-1">{{ $title }}</h2>
            <p class="text-sm text-gray-600 line-clamp-3">{{ $content }}</p>
        </div>

        <div class="mt-auto">
            <x-buttons.primary-button :href="$url">Selengkapnya</x-buttons.primary-button>
        </div>
    </div>
</div>
