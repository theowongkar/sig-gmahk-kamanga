@props([
    'type' => 'button',
    'href' => null,
    'name' => null,
    'value' => null,
])

@php
    $baseClass = 'px-3 py-2 bg-blue-600 text-white text-sm rounded-md cursor-pointer hover:bg-blue-700';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClass]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => $baseClass]) }}>
        {{ $slot }}
    </button>
@endif
