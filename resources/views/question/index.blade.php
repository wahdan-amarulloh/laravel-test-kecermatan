<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">

        <x-card title="{{ __('Plan') }}">
            {{-- <x-slot name="action">
                <x-card.action-link href="{{ route('subscription.create') }}" label="Create" />
            </x-slot> --}}
            <livewire:question-table />
        </x-card>

    </div>
</x-app-layout>
