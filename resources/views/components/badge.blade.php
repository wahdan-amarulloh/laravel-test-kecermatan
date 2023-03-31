@props(['items', 'action' => null])
@foreach ($items as $item)
    <span
        class="inline-flex items-center justify-center rounded bg-indigo-700 px-2 py-2 text-xs font-bold leading-none text-indigo-100">
        {{ $item->name }}

        @if ($action)
            <button x-data="@js($action)" x-init="detachID = '{{ $item->id }}'" type="button" @click="$wire.detachSingle(id,detachID)"
                class="ml-2 inline-flex items-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close Detail</span>
            </button>
        @endif
    </span>
@endforeach
