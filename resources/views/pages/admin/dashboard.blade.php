<x-back-layout>
    @section('title'){{ __('Dashboard') }}@endsection
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Welcome banner -->
        <x-admin.dashboard.welcome-banner />

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Avatars -->
            <x-admin.dashboard.dashboard-avatars :users="$users" :avatar="$avatar"/>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Filter button -->
                {{-- <x-admin.dropdown-filter align="right" /> --}}

                <!-- Datepicker built with flatpickr -->
                <x-admin.datepicker />

                <!-- Add view button -->
                <a href="{{ route('rice-distributions.create') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add Rice Distribution</span>
                </a>

            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">
            <!-- Line -->
            <x-admin.dashboard.dashboard-card :page="$page" :distribution="$distribution" :riceTotal="$riceTotal" />
        </div>
        <!-- Charts -->
        <div class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mt-4">
            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Real Time Data</h2>
                <div class="relative ml-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button
                        class="block"
                        aria-haspopup="true"
                        :aria-expanded="open"
                        @focus="open = true"
                        @focusout="open = false" @click.prevent
                    >
                        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                        </svg>
                    </button>
                    <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                        <div
                            class="bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-3 rounded shadow-lg overflow-hidden mb-2"
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-out duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-cloak
                        >
                            <div class="text-xs text-center whitespace-nowrap">This is real time data on incoming and outgoing rice</div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="grow">
                <canvas id="riceChart" width="595" height="148"></canvas>
            </div>
        </div>
    </div>
</x-back-layout>
