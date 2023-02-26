@props(['menu', 'parent'])

<ul x-show="selected == @js($parent) || open" x-transition:enter="transition-all duration-200 ease-out"
    x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
    class="top-full z-50 mb-1 block rounded rounded-t-none py-0.5 font-normal ltr:pl-7 ltr:text-left rtl:pr-7 rtl:text-right"
    style="display: none;">

    <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
        <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open"
            class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
            href="{{ Route::has($menu->route) ? route($menu->route) : $menu->route ?? '#' }}" aria-expanded="false">

            <span class="capitalize">{{ $menu->name }}</span>

            @if (count($menu->childs) > 1)
                <!-- caret -->
                <span class="inline-block ltr:float-right rtl:float-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-chevron-down mt-1.5 transform transition duration-300 ltr:-rotate-90 rtl:rotate-90"
                        :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }" width=".8rem"
                        height=".8rem" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                </span>
            @endif
        </a>

        @if (count($menu->childs) > 1)
            @foreach ($menu->childs as $child)
                <x-sidebar.childs :menu="$child" :parent="$child->id" />
            @endforeach
        @endif
    </li>
</ul>
