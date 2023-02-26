@props([
    'action' => null,
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'mb-6 rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800']) }}>
    <div class="flex flex-row justify-between pb-6">

        @if (isset($title) || isset($description))
            <div class="flex flex-col">
                @if (isset($title))
                    <h3 class="text-base font-bold capitalize">{{ $title }}</h3>
                @endif
                @if (isset($description))
                    <span class="text-sm text-gray-500 first-letter:uppercase">{{ $description }}</span>
                @endif
            </div>
        @endif

        @isset($action)
            <div x-data="{ open: false }" class="relative">
                <button @click="open = ! open"
                    class="text-gray-500 transition-colors duration-200 hover:text-gray-600 hover:outline-none focus:outline-none dark:hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-three-dots h-6 w-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                        </path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="rounded-t-non absolute z-10 origin-top-right rounded rounded border border-gray-200 bg-white ltr:right-0 rtl:left-0 dark:border-gray-700 dark:bg-gray-800"
                    style="min-width: 12rem;">
                    {{ $action }}
                </div>
            </div>
        @endisset

    </div>
    <div class="relative">
        {{ $slot }}
    </div>
</div>
