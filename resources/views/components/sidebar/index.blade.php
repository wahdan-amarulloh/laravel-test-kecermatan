<nav id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="open"
    :class="{ 'w-64 md:w-0': open, 'w-0 md:w-64': !(open) }"
    class="fixed h-screen w-0 bg-white shadow-sm transition-all duration-500 ease-in-out dark:bg-gray-800 md:w-64"
    aria-expanded="false" x-ref="nav">
    <div class="scrollbars relative h-full overflow-auto">
        <!--logo-->
        <div class="mh-18 py-5 text-center">
            <a href="#" class="relative">
                <h2 class="hidden-compact max-h-9 overflow-hidden px-4 text-2xl font-semibold text-gray-200">
                    <span class="text-gray-700 dark:text-gray-200">{{ config('app.name', 'Laravel') }}</span>
                </h2>
            </a>
        </div>

        @php
            $menus = session()->remember('menus', function () {
                return App\Models\Menu::with('childs')
                    ->parent()
                    ->get();
            });
        @endphp

        <!-- Sidebar menu -->
        <ul id="side-menu" x-data="{ selected: 1 }"
            class="float-none flex w-full flex-col font-medium ltr:pl-1.5 rtl:pr-1.5">
            <!-- dropdown -->

            @foreach ($menus as $index => $parent)
                <x-sidebar.menu :menu="$parent" />
            @endforeach

        </ul>

        @if (auth()->user()->plan->name === 'Free Plan')
            <!-- Banner -->
            <div class="box-banner px-4">
                <div class="my-8 rounded-lg bg-gray-300 bg-opacity-50 p-4 text-center dark:bg-gray-700">
                    <h4 class="mb-2 inline-block font-bold">Confirm Account</h4>
                    <div class="mb-3 text-sm">
                        Upgrade to a paid plan and enjoy enhanced functionality.
                    </div>

                    <div class="grid">
                        <a href="#"
                            class="mb-3 inline-block rounded border border-pink-500 bg-pink-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-pink-600 hover:bg-pink-600 hover:text-white hover:ring-0 focus:border-pink-600 focus:bg-pink-600 focus:outline-none focus:ring-0"
                            target="_blank">Confirm</a>
                    </div>
                </div>
            </div>
            <!-- end banner -->
        @endif
    </div>
</nav>
