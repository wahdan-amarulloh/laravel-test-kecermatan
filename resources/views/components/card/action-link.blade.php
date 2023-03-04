@props([
    'label' => null,
])
<a
    {{ $attributes->merge(['class' => 'cursor-pointer block bg-gray-50 px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900']) }}>{{ $label ?? $slot }}</a>
