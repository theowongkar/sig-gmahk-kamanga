@props(['name', 'id' => $name, 'label' => null, 'options' => [], 'selected' => old($name)])

@php
    $opts = is_array($options) ? $options : $options->toArray();
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="block mb-1 text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <select name="{{ $name }}" id="{{ $id }}"
        {{ $attributes->merge([
            'class' =>
                'w-full px-3 py-2 text-sm bg-white border rounded-md focus:outline-none focus:ring-1 ' .
                ($errors->has($name)
                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                    : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500'),
        ]) }}>
        <option value="">-- Pilih {{ $label ?? 'Opsi' }} --</option>
        @foreach ($options as $key => $optionLabel)
            @php
                if (is_string($key)) {
                    $value = $key;
                } elseif (is_int($key)) {
                    $isNumericArray = array_keys($opts) === range(0, count($opts) - 1);
                    $value = $isNumericArray ? $optionLabel : $key;
                } else {
                    $value = $key;
                }
            @endphp

            <option value="{{ $value }}" @selected((string) $value === (string) $selected)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
