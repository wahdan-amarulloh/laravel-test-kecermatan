@props(['items'])
@foreach ($items as $item)
    <span
        class="inline-flex items-center justify-center rounded bg-indigo-700 px-2 py-1 text-xs font-bold leading-none text-indigo-100">
        {{ $item->name }}
    </span>
@endforeach
