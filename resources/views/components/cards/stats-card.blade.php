@props(['count', 'title', 'subtitle', 'color'])

@php
    $triggerColor = ['bg-purple-500', 'bg-blue-500', 'bg-yellow-500', 'bg-amber-500', 'bg-green-500', 'bg-red-500'];
@endphp

{{-- Isi --}}
<div class="bg-white rounded-xl shadow overflow-hidden flex flex-col hover:scale-105 transition">
    <div class="px-4 py-2">
        <p class="text-3xl font-bold text-gray-800">{{ $count }}</p>
        <h2 class="text-md font-semibold text-gray-600">{{ $title }}</h2>
    </div>
    <div class="p-2 text-white {{ $color }} text-sm mt-auto truncate">
        {{ $subtitle }}
    </div>
</div>
