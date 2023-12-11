<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="">
        <div class="flex items-center px-5 py-6 shadow-sm rounded-md">
            <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                <x-tabler-hemisphere-plus class="h-8 w-8 text-white"/>
            </div>

            <div class="mx-5">
                <div class="text-3xl font-semibold text-slate-800 dark:text-slate-100 mr-2">{{ $riceTotal }}</div>
                <div class="text-gray-600 dark:text-gray-300">Total Rice</div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="">
        <div class="flex items-center px-5 py-6 shadow-sm rounded-md">
            <div class="p-3 rounded-full bg-yellow-600 bg-opacity-75">
                <x-tabler-book-2 class="h-8 w-8 text-white"/>
            </div>

            <div class="mx-5">
                <div class="text-3xl font-semibold text-slate-800 dark:text-slate-100 mr-2">{{ $page }}</div>
                <div class="text-gray-600 dark:text-gray-300">Total Pages</div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="">
        <div class="flex items-center px-5 py-6 shadow-sm rounded-md">
            <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                <x-tabler-location-share class="h-8 w-8 text-white"/>
            </div>

            <div class="mx-5">
                <div class="text-3xl font-semibold text-slate-800 dark:text-slate-100 mr-2">{{ $distribution }}</div>
                <div class="text-gray-600 dark:text-gray-300">Total Rice Distributions</div>
            </div>
        </div>
    </div>
</div>
