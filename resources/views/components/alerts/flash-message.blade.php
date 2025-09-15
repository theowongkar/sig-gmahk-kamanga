@props([
    'type' => session('flash.type') ?? (session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info'))),
    'message' => session('flash.message') ?? (session('success') ?? (session('error') ?? (session('warning') ?? session('info')))),
])

@if ($message)
    @php
        $color = match ($type) {
            'success' => 'green',
            'error' => 'red',
            'warning' => 'yellow',
            default => 'blue',
        };
    @endphp

    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" {{-- auto-hide setelah 3 detik --}}
        @class([
            'rounded-lg px-4 py-3 relative border',
            'bg-green-100 border-green-300 text-green-800' => $color === 'green',
            'bg-red-100 border-red-300 text-red-800' => $color === 'red',
            'bg-yellow-100 border-yellow-300 text-yellow-800' => $color === 'yellow',
            'bg-blue-100 border-blue-300 text-blue-800' => $color === 'blue',
        ]) role="alert">
        <span class="block text-sm font-medium">{{ $message }}</span>
    </div>
@endif
