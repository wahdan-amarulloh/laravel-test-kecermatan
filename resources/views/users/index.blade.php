<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">

        <x-card title="users">
            <div class="px-4 sm:px-6 lg:px-8" x-data>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            name, title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                            user</button>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div
                                class="relative mb-3 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div
                                    class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                                    <button type="button"
                                        class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Bulk
                                        edit</button>
                                    <button type="button"
                                        class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Delete
                                        all</button>
                                </div>

                                <x-table />
                            </div>
                            {{ $users->links('components.table.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </x-card>

    </div>
</x-app-layout>
