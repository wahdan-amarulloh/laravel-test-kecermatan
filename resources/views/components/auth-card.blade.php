{{-- <div class="flex min-h-screen flex-col items-center bg-gray-100 bg-hero-pattern pt-6 sm:justify-center sm:pt-0"> --}}
<div class="flex flex-col items-center">
    <div>
        {{ $logo }}
    </div>

    <div class="mt-6 w-full overflow-hidden bg-indigo-700/60 px-6 py-4 text-white shadow-md sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
