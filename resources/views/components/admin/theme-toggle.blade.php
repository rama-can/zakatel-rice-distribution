<div class="relative inline-flex" x-data="{ open: false, darkMode: '', svgMode: 'false' }" x-init="darkMode = localStorage.getItem('darkMode') || 'false'; svgMode = darkMode">
    <div>
        <button
            class="flex items-center justify-center cursor-pointer w-8 h-8 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
            :class="{ 'bg-gray-100 text-gray-500': open }"
            aria-haspopup="true"
            @click="open = !open"
            :aria-expanded="open"
        >
            <span class="sr-only">Menu</span>
            {{-- Light --}}
            <x-tabler-sun-filled x-show="svgMode === 'false'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
            {{-- Dark --}}
            <x-tabler-moon-stars x-show="svgMode === 'true'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
            {{-- System --}}
            <x-tabler-device-desktop x-show="svgMode === 'system'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
        </button>
        <div
            class="origin-top-right z-10 absolute top-full left-0 bg-white border dark:bg-slate-800  border-gray-200 dark:border-gray-500 py-1.5 rounded shadow-lg overflow-hidden mt-1"
            @click.outside="open = false"
            @keydown.escape.window="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-200 transform"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-out duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
        >
            <ul>
                <li class="font-medium text-sm hover:bg-indigo-50 dark:text-slate-300 dark:hover:text-slate-200 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('false'); open = false; svgMode = 'false';"
                x-bind:class="svgMode === 'false' ? 'text-indigo-500' : ''">
                    <x-tabler-sun-filled class="w-5 h-5 mr-2" />
                    Light
                </li>
                <li class="font-medium text-sm hover:bg-indigo-50 text-gray-600 hover:text-gray-700 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('true'); open = false; svgMode = 'true';"
                x-bind:class="svgMode === 'true' ? 'text-indigo-500 dark:hover:text-indigo-400' : 'dark:text-slate-300 dark:hover:text-slate-100'"
                ><x-tabler-moon-stars class="w-5 h-5 mr-2"/>
                    Dark
                </li>
                <li class="font-medium text-sm hover:bg-indigo-50 text-gray-600 hover:text-gray-700 dark:hover:text-slate-100 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('system'); open = false; svgMode = 'system';"
                x-bind:class="svgMode === 'system' ? 'text-indigo-500' : 'dark:text-slate-300 dark:hover:text-indigo-400'"
                ><x-tabler-device-desktop class="w-5 h-5 mr-2"/>
                    System
                </li>
            </ul>
        </div>
    </div>

    <script>
        function setMode(value) {
            if (value === 'system') {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else {
                document.documentElement.classList.toggle('dark', value === 'true');
            }
        }

        function selectMode(value) {
            localStorage.setItem('darkMode', value);
            setMode(value);
        }

        setMode(localStorage.getItem('darkMode') || 'false');
    </script>
</div>



{{-- <div>
    <input type="checkbox" name="light-switch" id="light-switch" class="light-switch sr-only" />
    <label class="flex items-center justify-center cursor-pointer w-8 h-8 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full" for="light-switch">

        <svg class="w-5 h-5 hidden dark:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 5a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-10z"></path>
            <path d="M7 20h10"></path>
            <path d="M9 16v4"></path>
            <path d="M15 16v4"></path>
         </svg>

        <svg class="w-4 h-4 dark:hidden" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-slate-400" d="M7 0h2v2H7V0Zm5.88 1.637 1.414 1.415-1.415 1.413-1.414-1.414 1.415-1.414ZM14 7h2v2h-2V7Zm-1.05 7.433-1.415-1.414 1.414-1.414 1.415 1.413-1.414 1.415ZM7 14h2v2H7v-2Zm-4.02.363L1.566 12.95l1.415-1.414 1.414 1.415-1.415 1.413ZM0 7h2v2H0V7Zm3.05-5.293L4.465 3.12 3.05 4.535 1.636 3.121 3.05 1.707Z" />
            <path class="fill-current text-slate-500" d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z" />
        </svg>

        <svg class="w-4 h-4 hidden dark:block" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-slate-400" d="M6.2 2C3.2 2.8 1 5.6 1 8.9 1 12.8 4.2 16 8.1 16c3.3 0 6-2.2 6.9-5.2C9.7 12.2 4.8 7.3 6.2 2Z" />
            <path class="fill-current text-slate-500" d="M12.5 6a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 6Z" />
        </svg>
        <span class="sr-only">Switch to light / dark version</span>
    </label>
</div> --}}
