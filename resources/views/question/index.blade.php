<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto grid w-full gap-2 p-2 md:grid-cols-3" x-data="question()">

        <x-card class="col-span-3 overflow-auto sm:block" ::class="showDetail || showCreate ? 'hidden md:block md:col-span-2' : 'block md:col-span-3'" title="{{ __('Plan') }}">
            <x-slot name="close">
                <button type="button" @click="toggleCreate()"
                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                    <span class="sr-only">Create Detail</span>
                </button>
            </x-slot>

            <livewire:question-table />

            <x-button @click="toggleDetail()">Click</x-button>
        </x-card>

        {{-- Create Detail --}}
        <x-card class="col-span-3 sm:col-span-1" style="display: none" title="{{ __('Create Detail') }}"
            x-show="showCreate" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full" x-on:click.away="slideOut = false">
            <x-slot name="close">
                <button type="button" @click="toggleCreate()"
                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close Detail</span>
                </button>
            </x-slot>
        </x-card>

        <x-card class="col-span-3 sm:col-span-1" style="display: none" title="{{ __('Plan Detail') }}"
            x-show="showDetail" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full" x-on:click.away="slideOut = false">

            <div class="flex flex-col">
                <span x-text="'Edit detail '+currentDetail"
                    class="text-sm text-gray-500 first-letter:uppercase">Loading</span>
            </div>

            {{-- Edit  --}}
            <div class="space-y-3 divide-y dark:divide-slate-700">
                <template x-for="(detail, index) in details" :key="index">
                    <div>
                        <form action="">
                            <div class="mt-3 flex">
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
                            </div>
                            <div class="mt-3 flex content-center justify-between">
                                <div class="mx-0 w-1/3 px-1 sm:mx-2 sm:px-2">
                                    <x-input maxlength="10" id="A" class="mt-1 block w-full uppercase"
                                        type="text" x-model="detail.answer" aria-placeholder="answer"
                                        placeholder="answer" />
                                </div>
                                <div class="flex">
                                    <button @click.prevent="removeDetail(index)"
                                        class="rounded bg-red-500 py-1 px-3 font-bold text-white hover:bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
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

        </x-card>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("question", () => ({
                    showDetail: false,
                    showCreate: false,
                    toggleCreate() {
                        this.showDetail = false;
                        this.showCreate = !this.showCreate;
                    },
                    toggleDetail(id) {
                        this.showCreate = false;
                        this.showDetail = id ? true : !this.showDetail;
                        this.currentDetail = id;
                        this.details = [];
                        this.addDetail();
                    },
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
                            answer: null
                        })
                    },
                    removeDetail(index) {
                        this.details.splice(index, 1);
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
