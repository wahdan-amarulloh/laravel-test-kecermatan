@props([
    'href' => '#',
    'label' => null,
])
<a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
    href="{{ $href }}">{{ $label ?? $slot }}</a>
