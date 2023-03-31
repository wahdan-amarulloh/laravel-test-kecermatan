<div x-data="{ selectedGroupId: '' }" class="mx-4 flex flex-col items-center sm:mx-0">
    <div class="mb-2 w-full">
        <div class="relative flex flex-wrap items-stretch space-x-2">
            <select x-model="selectedGroupId"
                class="mb-6 block w-full flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                <option selected>Pilih group</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <div class="flex-shrink-0">
                <button type="button" @click="$wire.attachGroup(selectedGroupId)"
                    class="rounded-l-md rounded-r-md bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">
                    Add
                </button>
            </div>
        </div>

    </div>
    <div class="mb-2 flex w-full flex-row space-x-2">
        @foreach ($subscription->groups as $group)
            <span id="badge-dismiss-indigo"
                class="mr-2 inline-flex items-center rounded bg-indigo-100 px-2 py-1 text-sm font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                {{ $group->name }}
                <button type="button" @click="$wire.detachGroup({{ $group->id }})"
                    class="ml-2 inline-flex items-center rounded-sm bg-transparent p-0.5 text-sm text-indigo-400 hover:bg-indigo-200 hover:text-indigo-900 dark:hover:bg-indigo-800 dark:hover:text-indigo-300"
                    data-dismiss-target="#badge-dismiss-indigo" aria-label="Remove">
                    <svg aria-hidden="true" class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Remove badge</span>
                </button>
            </span>
        @endforeach
    </div>
</div>
