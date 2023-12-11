<div class="md:col-span-1 flex justify-between">
    <div class="px-2 sm:px-0">
        <h2 class=" text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h2>
        @isset($description)
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
        @endisset
    </div>
    <div class="px-2 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
