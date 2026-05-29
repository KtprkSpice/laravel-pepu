@props([
    'type' => 'submit',
    'btnName',
])
<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'px-5 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-900 cursor-pointer',
    ]) }}>{{ $btnName }}</button>
