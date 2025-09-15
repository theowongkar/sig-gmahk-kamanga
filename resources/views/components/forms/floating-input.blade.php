@props([
    'type' => 'text',
    'name',
    'id' => $name ?? 'input-' . uniqid(),
    'label' => null,
    'value' => old($name),
    'placeholder' => '',
])

<div class="relative mb-6">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}"
        placeholder=" "
        {{ $attributes->merge([
            'class' =>
                'peer w-full border-0 border-b-2 bg-transparent px-3 pt-5 pb-2 text-sm text-gray-900 focus:outline-none focus:ring-0 ' .
                ($errors->has($name) ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500'),
        ]) }} />

    @if ($label)
        <label for="{{ $id }}"
            class="absolute left-3 top-2 text-sm text-gray-500 transition-all origin-[0] duration-200
                   peer-placeholder-shown:translate-y-4 peer-placeholder-shown:scale-100
                   peer-focus:scale-75 peer-focus:-translate-y-1.5
                   peer-not-placeholder-shown:scale-75 peer-not-placeholder-shown:-translate-y-1.5">
            {{ $label }}
        </label>
    @endif

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
