@props(['tabs', 'activeTab', 'action', 'submit', 'enctype' => ''])

<div {{ $attributes->merge(['class' => 'space-y-12']) }}>
    <div class="md:mt-0 md:col-span-1 grid-cols-1">
        <x-admin.section-title>
            <x-slot name="title">{{ $title }}</x-slot>
        </x-admin.section-title>
        <div x-data="{ activeTab: '{{ $activeTab ?? $tabs[0]['id'] }}' }" class="bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-600 rounded-lg mt-5">
            <!-- Start -->
            <div class="flex">
                @foreach ($tabs as $tab)
                    <button @click="activeTab = '{{ $tab['id'] }}'" :class="{
                    'bg-white dark:bg-slate-800 text-indigo-600 dark:text-white border-r-3 border-indigo-500 hover': activeTab === '{{ $tab['id'] }}',
                    'bg-slate-100  dark:bg-slate-900 text-gray-500 dark:text-gray-400 border-r-3 border-slate-500': activeTab !== '{{ $tab['id'] }}' }"
                    class="text-sm font-medium py-2 px-4 rounded-t-lg whitespace-nowrap flex items-center">
                        @svg('tabler-' . $tab['icon'], 'h-5 w-5 mr-1')
                        {{ $tab['id'] }}
                    </button>
                @endforeach
            </div>

            <form action="{{ $action }}" method="POST" {{ $attributes->merge(['enctype' => $enctype]) }}>
                <div class="px-4 py-5 bg-white dark:bg-slate-800 sm:p-6 shadow">
                    <div>
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-slate-900 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
