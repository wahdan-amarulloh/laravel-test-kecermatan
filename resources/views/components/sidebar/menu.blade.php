@props(['menu'])

<li class="relative">
    <a :class="{ 'text-indigo-500 dark:text-gray-300': selected == @js($menu->id) }"
        @click="selected !== @js($menu->id) ? selected = @js($menu->id) : selected = null"
        class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
        href="{{ Route::has($menu->route) ? route($menu->route) : $menu->route ?? '#' }}">

        @if ($menu->icon)
            {!! $menu->icon !!}
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-columns-gap inline-block h-4 w-4 ltr:mr-2 rtl:ml-2" viewBox="0 0 16 16">
                <path
                    d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z">
                </path>
            </svg>
        @endif

        <span class="capitalize">{{ $menu->name }} </span>

        @if (count($menu->childs) > 0)
            <span class="inline-block ltr:float-right rtl:float-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-chevron-down mt-1.5 transform transition duration-300 ltr:-rotate-90 rtl:rotate-90"
                    :class="{ 'rotate-0': selected == 1, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 1) }"
                    width=".8rem" height=".8rem" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                    </path>
                </svg>
        @endif

    </a>

    @if ($menu->childs)
        @foreach ($menu->childs as $child)
            <x-sidebar.childs :menu="$child" :parent="$menu->id" />
        @endforeach
    @endif
</li>
