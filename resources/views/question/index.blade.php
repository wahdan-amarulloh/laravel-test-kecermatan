<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto grid w-full gap-2 p-2 md:grid-cols-3" x-data="question()">
        <x-card class="col-span-3 overflow-auto" ::class="showDetail ? 'md:col-span-2' : 'md:col-span-3'" title="{{ __('Plan') }}">
            {{-- <x-slot name="action">
                <x-card.action-link href="{{ route('subscription.create') }}" label="Create" />
            </x-slot> --}}
            <livewire:question-table />

            <x-button @click="toggleDetail()">Click</x-button>
        </x-card>

        <x-card class="col-span-3 sm:col-span-1" style="display: none" title="{{ __('Plan Detail') }}" x-show="showDetail"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            x-on:click.away="slideOut = false">


            <div class="space-y-3 divide-y dark:divide-slate-700">
                <div>
                    <form class="mt-3 flex" action="">
                        <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                            <x-input id="A" class="mt-1 block w-full" type="text" name="details['A']"
                                aria-placeholder="A" placeholder="A" autofocus />
                        </div>
                        <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                            <x-input id="A" class="mt-1 block w-full" type="text" name="details['B']"
                                aria-placeholder="B" placeholder="B" autofocus />
                        </div>
                        <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                            <x-input id="A" class="mt-1 block w-full" type="text" name="details['C']"
                                aria-placeholder="C" placeholder="C" autofocus />
                        </div>
                        <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                            <x-input id="A" class="mt-1 block w-full" type="text" name="details['D']"
                                aria-placeholder="D" placeholder="D" autofocus />
                        </div>
                        <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                            <x-input id="A" class="mt-1 block w-full" type="text" name="details['E']"
                                aria-placeholder="E" placeholder="E" autofocus />
                        </div>
                    </form>
                </div>

                <div class="flex">
                    <div class="h-12 flex-1 bg-gray-500"></div>
                    <div class="h-12 w-1/4 bg-gray-900"></div>
                </div>

                <template x-if="isLoading">
                    <div class="flex animate-pulse pt-3">
                        <div class="mx-2 h-16 w-1/5 bg-gray-200 px-2"></div>
                        <div class="mx-2 h-16 w-1/5 bg-gray-300 px-2"></div>
                        <div class="mx-2 h-16 w-1/5 bg-gray-400 px-2"></div>
                        <div class="mx-2 h-16 w-1/5 bg-gray-500 px-2"></div>
                        <div class="mx-2 h-16 w-1/5 bg-gray-600 px-2"></div>
                    </div>
                </template>
            </div>

            {{-- <div x-show="!isLoading"
                class="grid grid-cols-1 divide-y overflow-hidden text-center font-mono text-sm font-bold leading-6 shadow-lg dark:divide-slate-700">
                <div class="bg-white p-4 text-slate-400 dark:bg-slate-800">
                    <form class="w-full max-w-lg">
                        <div class="-mx-3 mb-6 flex flex-wrap">
                            <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-first-name">
                                    First Name
                                </label>
                                <input
                                    class="mb-3 block w-full appearance-none rounded border border-red-500 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:bg-white focus:outline-none"
                                    id="grid-first-name" type="text" placeholder="Jane">
                                <p class="text-xs italic text-red-500">Please fill out this field.</p>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-last-name">
                                    Last Name
                                </label>
                                <input
                                    class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                    id="grid-last-name" type="text" placeholder="Doe">
                            </div>
                        </div>
                        <div class="-mx-3 mb-6 flex flex-wrap">
                            <div class="w-full px-3">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-password">
                                    Password
                                </label>
                                <input
                                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                    id="grid-password" type="password" placeholder="******************">
                                <p class="text-xs italic text-gray-600">Make it as long and as crazy as you'd like</p>
                            </div>
                        </div>
                        <div class="-mx-3 mb-2 flex flex-wrap">
                            <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-city">
                                    City
                                </label>
                                <input
                                    class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                    id="grid-city" type="text" placeholder="Albuquerque">
                            </div>
                            <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-state">
                                    State
                                </label>
                                <div class="relative">
                                    <select
                                        class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        id="grid-state">
                                        <option>New Mexico</option>
                                        <option>Missouri</option>
                                        <option>Texas</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                    for="grid-zip">
                                    Zip
                                </label>
                                <input
                                    class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                    id="grid-zip" type="text" placeholder="90210">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-white p-4 text-slate-400 dark:bg-slate-800">02</div>
                <div class="bg-white p-4 text-slate-400 dark:bg-slate-800">03</div>
            </div> --}}
        </x-card>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("question", () => ({
                    showDetail: true,
                    isLoading: false,
                    toggleDetail() {
                        this.showDetail = !this.showDetail
                    },
                    init: () => {
                        console.log('init');
                    }
                }));
            });
        </script>
    @endpush
</x-app-layout>
