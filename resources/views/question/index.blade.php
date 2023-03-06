<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto grid w-full gap-2 p-2 md:grid-cols-3" x-data="question()">

        <x-card class="col-span-3 overflow-auto sm:block" ::class="showDetail ? 'hidden md:block md:col-span-2' : 'block md:col-span-3'" title="{{ __('Plan') }}">
            <livewire:question-table />
            <x-button @click="toggleDetail()">Click</x-button>
        </x-card>

        <x-card class="col-span-3 sm:col-span-1" style="display: none" title="{{ __('Plan Detail') }}" x-show="showDetail"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            x-on:click.away="slideOut = false">

            <div class="space-y-3 divide-y dark:divide-slate-700">
                <template x-for="(detail, index) in details" :key="index">
                    <div>
                        <form class="mt-3 flex" action="">
                            <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                                <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                    type="text" x-model="detail.A" aria-placeholder="A" placeholder="A" />
                            </div>
                            <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                                <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                    type="text" x-model="detail.B" aria-placeholder="B" placeholder="B" />
                            </div>
                            <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                                <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                    type="text" x-model="detail.C" aria-placeholder="C" placeholder="C" />
                            </div>
                            <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                                <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                    type="text" x-model="detail.D" aria-placeholder="D" placeholder="D" />
                            </div>
                            <div class="mx-0 h-14 w-1/5 px-1 sm:mx-2 sm:px-2">
                                <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                    type="text" x-model="detail.E" aria-placeholder="E" placeholder="E" />
                            </div>
                            <div class="flex content-center justify-center">
                                <button @click.prevent="removeDetail(index)"
                                    class="rounded bg-red-500 py-1.5 px-3 font-bold text-white hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </template>

                <div class="flex justify-between pt-3">
                    <div class="flex gap-2">
                        <button @click="addDetail()"
                            class="rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">
                            Add
                        </button>
                        <button class="rounded bg-red-500 py-2 px-4 font-bold text-white hover:bg-red-700">
                            Delete
                        </button>
                    </div>
                    <button type="button" @click="submit()"
                        class="inline-flex cursor-pointer items-center rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold leading-6 text-white shadow transition duration-150 ease-in-out hover:bg-indigo-400"
                        ::disabled="isLoading">
                        <svg x-show="isLoading" class="-ml-1 mr-3 h-5 w-5 animate-spin text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Submit
                    </button>
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
                    showDetail: false,
                    isLoading: false,
                    currentDetail: null,
                    get buttonText() {
                        return this.isLoading ? 'Processing' : 'Submit'
                    },
                    details: [],
                    addDetail() {
                        this.details.push({
                            question_id: this.currentDetail,
                            A: null,
                            B: null,
                            C: null,
                            D: null,
                            E: null,
                        })
                    },
                    removeDetail(index) {
                        this.details.splice(index, 1);
                    },
                    toggleDetail(id) {
                        this.showDetail = !this.showDetail;
                        this.currentDetail = id;
                        this.details = [];
                        this.addDetail();
                    },
                    async submit() {
                        this.isLoading = true;
                        let responses = axios.post('{{ route('detail.store') }}', {
                                detail: this.details
                            })
                            .then((response) => {
                                console.log('response', response);
                                this.isLoading = false;
                            });
                    },
                    init: () => {
                        console.log('init');
                    }
                }));
            });
        </script>
    @endpush
</x-app-layout>
