<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">

        <div class="flex flex-row justify-between gap-2 md:gap-4">
            <x-card title="detail event" class="flex-1">
                <div class="-mx-4 flex flex-row flex-wrap divide-x">
                    <div class="w-full max-w-full flex-shrink px-4 pt-8 lg:w-1/2">
                        <div class="mb-6">
                            <input type="text"
                                class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                id="exampleInput1" placeholder="Judul Acara Event">
                        </div>
                        <div class="mb-6">
                            <div class="mb-4 flex flex-row flex-nowrap items-center">
                                <div class="mr-6">
                                    <input
                                        class="form-checkbox h-5 w-5 rounded rounded-full border border-gray-300 text-indigo-500 focus:outline-none ltr:mr-3 rtl:ml-3 dark:border-gray-700 dark:bg-gray-700"
                                        type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="inline-block" for="flexRadioDefault2">
                                        Langsung
                                    </label>
                                </div>

                                <div class="mr-6">
                                    <input
                                        class="form-checkbox h-5 w-5 rounded rounded-full border border-gray-300 text-indigo-500 focus:outline-none ltr:mr-3 rtl:ml-3 dark:border-gray-700 dark:bg-gray-700"
                                        type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="inline-block" for="flexRadioDefault2">
                                        Daring
                                    </label>
                                </div>

                                <div class="mr-6">
                                    <div id="datepicks"
                                        class="flex flex-row items-center justify-center md:flex-row md:justify-between">
                                        <input id="datepick" x-time
                                            class="datepick relative w-20 overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 text-sm leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                            type="text" name="start" placeholder="Jam">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <select
                                class="select-caret relative inline-block w-full appearance-none overflow-x-auto rounded border border-gray-300 bg-white py-2 pl-3 pr-8 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                aria-label="Default select example">
                                <option selected>Provinsi</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <select
                                class="select-caret relative inline-block w-full appearance-none overflow-x-auto rounded border border-gray-300 bg-white py-2 pl-3 pr-8 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                aria-label="Default select example">
                                <option selected>Kabupaten</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <select
                                class="select-caret relative inline-block w-full appearance-none overflow-x-auto rounded border border-gray-300 bg-white py-2 pl-3 pr-8 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                aria-label="Default select example">
                                <option selected>Kecamatan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <select
                                class="select-caret relative inline-block w-full appearance-none overflow-x-auto rounded border border-gray-300 bg-white py-2 pl-3 pr-8 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                aria-label="Default select example">
                                <option selected>Kelurahan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-6 flex flex-row flex-nowrap items-center justify-between">
                            <label class="w-full" for="exampleInput1">Jumlah Acara</label>
                            <input type="text"
                                class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                id="exampleInput1" placeholder="Judul Acara Event">
                        </div>
                    </div>
                    <div class="w-full max-w-full flex-shrink px-4 lg:w-1/2">
                        <h3 class="mb-2 text-base font-bold capitalize">Doorprize :</h3>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="-mx-4 mb-6 flex flex-row flex-wrap">
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-2/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Doorprize" aria-label="First name">
                            </div>
                            <div class="mb-6 w-full max-w-full flex-shrink px-4 lg:mb-0 lg:w-1/3">
                                <input type="text"
                                    class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="flex flex-row flex-nowrap items-center justify-end">
                            <button type="button"
                                class="mb-3 inline-block rounded rounded-full border border-indigo-500 bg-indigo-500 p-2 text-center leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </x-card>

            <x-card title="Calender">
                <div class="mb-6">
                    <input type="text" x-calendar
                        class="relative hidden w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                        placeholder="Doorprize" aria-label="First name">
                </div>
                <div class="mb-6">
                    <div class="mb-6">
                        <label for="exampleTextarea1" class="mb-2 inline-block text-base font-bold">Catatan</label>
                        <textarea
                            class="relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                            id="exampleTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="mb-6 flex flex-row flex-nowrap items-center justify-end">
                    <button type="button"
                        class="mb-3 mr-2 inline-block rounded border border-red-500 bg-red-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-red-600 hover:bg-red-600 hover:text-white hover:ring-0 focus:border-red-600 focus:bg-red-600 focus:outline-none focus:ring-0">Batal</button>
                    <button type="button"
                        class="mb-3 inline-block rounded border border-indigo-500 bg-indigo-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0">Simpan</button>

                </div>
            </x-card>
        </div>

        <x-card title="buttons">
            <div class="mb-6">
                <button type="button"
                    class="mb-3 inline-block rounded border border-indigo-500 bg-indigo-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0">Primary</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-green-500 bg-green-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-green-600 hover:bg-green-600 hover:text-white hover:ring-0 focus:border-green-600 focus:bg-green-600 focus:outline-none focus:ring-0">Success</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-red-500 bg-red-500 py-2 px-4 text-center leading-5 text-gray-100 hover:border-red-600 hover:bg-red-600 hover:text-white hover:ring-0 focus:border-red-600 focus:bg-red-600 focus:outline-none focus:ring-0">Danger</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-yellow-300 bg-yellow-300 py-2 px-4 text-center leading-5 text-gray-800 hover:border-yellow-400 hover:bg-yellow-400 hover:text-gray-900 hover:ring-0 focus:border-yellow-400 focus:bg-yellow-400 focus:outline-none focus:ring-0">Warning</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-indigo-300 bg-indigo-300 py-2 px-4 text-center leading-5 text-gray-800 hover:border-indigo-500 hover:bg-indigo-500 hover:text-gray-900 hover:ring-0 focus:border-indigo-500 focus:bg-indigo-500 focus:outline-none focus:ring-0">Info</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-gray-100 bg-gray-100 py-2 px-4 text-center leading-5 text-gray-800 hover:border-gray-200 hover:bg-gray-200 hover:text-gray-900 hover:ring-0 focus:border-gray-200 focus:bg-gray-200 focus:outline-none focus:ring-0">Light</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-gray-900 bg-gray-900 py-2 px-4 text-center leading-5 text-gray-100 hover:border-black hover:bg-black hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">Dark</button>
                <button type="button"
                    class="mb-3 mr-2 inline-block cursor-not-allowed rounded border border-indigo-500 bg-indigo-500 py-2 px-4 text-center leading-5 text-gray-100 opacity-70"
                    disabled>Primary</button>
            </div>

            <div class="mb-6">
                <button type="button"
                    class="mb-3 inline-block rounded border border-indigo-500 bg-transparent py-2 px-4 text-center leading-5 text-indigo-500 hover:border-indigo-500 hover:bg-indigo-500 hover:text-gray-100 hover:ring-0 focus:border-indigo-500 focus:bg-indigo-500 focus:text-gray-100 focus:outline-none focus:ring-0">Primary</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-green-500 bg-transparent py-2 px-4 text-center leading-5 text-green-500 hover:border-green-500 hover:bg-green-500 hover:text-white hover:ring-0 focus:border-green-500 focus:bg-green-500 focus:text-white focus:outline-none focus:ring-0">Success</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-red-500 bg-transparent py-2 px-4 text-center leading-5 text-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white hover:ring-0 focus:border-red-500 focus:bg-red-500 focus:text-white focus:outline-none focus:ring-0">Danger</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-yellow-500 bg-transparent py-2 px-4 text-center leading-5 text-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-gray-100 hover:ring-0 focus:border-yellow-500 focus:bg-yellow-500 focus:text-gray-900 focus:outline-none focus:ring-0">Warning</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-indigo-300 bg-transparent py-2 px-4 text-center leading-5 text-indigo-300 hover:border-indigo-300 hover:bg-indigo-300 hover:text-gray-900 hover:ring-0 focus:border-indigo-300 focus:bg-indigo-300 focus:text-gray-900 focus:outline-none focus:ring-0">Info</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-gray-100 bg-transparent py-2 px-4 text-center leading-5 text-gray-100 hover:border-gray-200 hover:bg-gray-200 hover:text-gray-900 hover:ring-0 focus:border-gray-200 focus:bg-gray-200 focus:text-gray-900 focus:outline-none focus:ring-0">Light</button>
                <button type="button"
                    class="mb-3 inline-block rounded border border-gray-900 bg-transparent py-2 px-4 text-center leading-5 text-gray-900 hover:border-black hover:bg-black hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:text-white focus:outline-none focus:ring-0">Dark</button>
            </div>
        </x-card>


        <x-card title="flatpickr " description="flatpickr ">
            <div class="mb-6" x-data x-init="flatpickr($refs.input, {});">
                <label for="datepick" class="mb-2 inline-block">Date picker</label>
                <div id="datepicks" class="flex flex-col justify-center md:flex-row md:justify-between">
                    <input id="datepick" x-ref="input"
                        class="datepick relative w-full overflow-x-auto rounded border border-gray-300 bg-white py-2 px-4 text-sm leading-5 text-gray-800 focus:border-gray-400 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-gray-600"
                        type="text" name="start">
                </div>
            </div>
        </x-card>

        <x-card title="hallo" description="hallo all">
            <x-slot name="action">
                <x-card.action-link label="Daily" />
            </x-slot>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, non obcaecati accusamus dolore, cumque
            officiis modi perferendis ducimus a maiores dignissimos doloremque sint beatae! Voluptatibus modi nisi iste
            odio. Fugiat?
        </x-card>
    </div>

</x-app-layout>
