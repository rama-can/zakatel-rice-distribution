<header
    class="sticky top-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-slate-200 border-b border-gray-200 bg-opacity-50 dark:bg-opacity-50 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700" style="backdrop-filter: blur(10px);">
    <nav class="relative max-w-7xl w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
        aria-label="Global">
        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold dark:text-white" href="{{ route('home') }}" aria-label="Brand">
                <img class="inline-block h-[2.875rem] w-[2.875rem]" src="{{ Storage::url($getTheme['logo']) }}" alt="Image Description">
            </a>
            <div class="sm:hidden">
                <button type="button"
                    class="hs-collapse-toggle w-9 h-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <svg class="hs-collapse-open:block flex-shrink-0 hidden w-4 h-4" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="navbar-collapse-with-animation"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
            <div
                class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                <a class="font-semibold {{  request()->routeIs('home') ? 'text-indigo-600 dark:text-indigo-500' : 'text-gray-500 dark:text-gray-400'  }} hover:text-indigo-500 dark:hover:text-indigo-500 sm:py-6" href="{{ route('home') }}"
                    aria-current="page">Home</a>
                <a class="font-semibold {{  request()->routeIs('distribution') || request()->routeIs('distribution.detail') ? 'text-indigo-600 dark:text-indigo-500' : 'text-gray-500 dark:text-gray-400'  }} hover:text-indigo-500 dark:hover:text-indigo-500 sm:py-6"
                    href="{{ route('distribution') }}">Distribusi Beras</a>
                <a class="font-semibold {{  request()->routeIs('rice.report') ? 'text-indigo-600 dark:text-indigo-500' : 'text-gray-500 dark:text-gray-400'  }} hover:text-indigo-500 dark:hover:text-indigo-500 sm:py-6"
                    href="{{ route('rice.report') }}">Laporan Beras</a>
                <a class="font-semibold {{  request()->routeIs('page.detail') ? 'text-indigo-600 dark:text-indigo-500' : 'text-gray-500 dark:text-gray-400'  }} hover:text-indigo-500 dark:hover:text-indigo-500 sm:py-6"
                        href="{{ route('page.detail', 'tentang-kami') }}">Tentang Kami</a>
                <span class="flex items-center gap-x-2 font-semibold text-gray-500 hover:text-indigo-500 sm:border-s sm:border-gray-300 sm:my-6 sm:ps-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-indigo-500"
                    >
                    <x-frontend.theme-toggle />
                </span>
            </div>
        </div>
    </nav>
</header>
