@props(['label', 'name', 'type' => 'text', 'value' => ''])

<div class="flex flex-col w-2xs p-2 gap-4 mb-6">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $attributes->merge([
            'class' => 'outline-0 border border-black p-2',
        ]) }}>
    @error($name)
        <small class="text-red-500">
            {{ $message }}
        </small>
    @enderror
</div>
