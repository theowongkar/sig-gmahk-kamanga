@props(['date', 'startTime', 'category', 'preacher' => null, 'mc' => null, 'singers' => collect([]), 'location'])

<div class="bg-white shadow-lg rounded-2xl p-6 transform transition duration-300 hover:scale-105">
    <div class="flex items-center gap-4">
        {{-- Tanggal --}}
        <div class="text-center bg-gray-100 p-3 rounded-lg w-20">
            <p class="text-3xl font-bold text-gray-800">
                {{ \Carbon\Carbon::parse($date)->format('d') }}
            </p>
            <p class="text-xs text-gray-500">
                {{ \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('M Y') }}
            </p>
            <p class="text-red-600 text-sm font-semibold">
                {{ \Carbon\Carbon::parse($startTime)->format('H:i') }}
            </p>
        </div>

        {{-- Kategori --}}
        <div class="flex-1">
            <p class="text-md font-semibold text-gray-700 uppercase">Kategori :</p>
            <p class="text-lg font-bold text-[#375E97]">{{ $category }}</p>
        </div>
    </div>

    {{-- Detail --}}
    <div class="mt-4 space-y-2 text-sm">
        <p>
            <strong>Pengkhotbah:</strong>
            <span class="text-gray-600">{{ $preacher->name ?? '-' }}</span>
        </p>
        <p>
            <strong>MC:</strong>
            <span class="text-gray-600">{{ $mc->name ?? '-' }}</span>
        </p>
        <p>
            <strong>Singer:</strong>
            <span class="text-gray-600">
                {{ $singers->pluck('name')->join(', ') ?: '-' }}
            </span>
        </p>
        <p>
            <strong>Tempat:</strong>
            <span class="text-gray-600">{{ $location }}</span>
        </p>
    </div>
</div>
