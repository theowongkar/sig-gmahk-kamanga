@props(['name', 'id' => $name, 'label' => null, 'options' => [], 'selected' => old($name)])

@php
    $isFilled = $selected ? 'filled' : '';
@endphp

<div class="relative mb-6">
    <select name="{{ $name }}" id="{{ $id }}" data-select
        class="peer w-full border-0 border-b-2 bg-transparent px-3 pt-5 pb-2 text-sm text-gray-900 focus:outline-none focus:ring-0 appearance-none {{ $errors->has($name) ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500' }} {{ $isFilled }}"
        onchange="this.classList.toggle('filled', this.value !== '')">
        <option value="" disabled hidden {{ $selected ? '' : 'selected' }}></option>
        @foreach ($options as $key => $optionLabel)
            <option value="{{ $key }}" @selected((string) $key === (string) $selected)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @if ($label)
        <label for="{{ $id }}"
            class="absolute left-3 top-2 text-sm text-gray-500 transition-all origin-[0] duration-200
                   peer-focus:scale-75 peer-focus:-translate-y-1.5
                   filled:scale-75 filled:-translate-y-1.5">
            {{ $label }}
        </label>
    @endif

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<style>
    select.filled + label {
    transform: translateY(-0.375rem) scale(0.75);
    transform-origin: top left;
}

</style>