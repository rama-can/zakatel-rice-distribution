@props(['action','submit', 'enctype' => ''])

<div {{ $attributes->merge(['class' => 'grid gap-4 gap-y-2 text-sm grid-cols-1']) }}>
    <x-admin.section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-admin.section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ $action }}" method="POST" {{ $attributes->merge(['enctype' => $enctype]) }}>
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-slate-700 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
