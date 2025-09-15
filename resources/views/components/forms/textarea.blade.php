@props(['name', 'id' => $name, 'label' => null, 'value' => old($name), 'rows' => 4, 'placeholder' => ''])

<div>
    @if ($label)
        <label for="{{ $id }}" class="block mb-1 text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' =>
                'w-full px-3 py-2 text-sm bg-white border rounded-md focus:outline-none focus:ring-1 ' .
                ($errors->has($name)
                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                    : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500'),
        ]) }}>{{ $value }}</textarea>

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
