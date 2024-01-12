<div class="hs-dropdown" data-hs-dropdown-placement="bottom-right" data-hs-dropdown-offset="30" x-data="{ open: false, darkModeFrontend: '', svgMode: 'false' }" x-init="darkModeFrontend = localStorage.getItem('darkModeFrontend') || 'false'; svgMode = darkModeFrontend">
    <button type="button" class="hs-dropdown-toggle group flex items-center text-gray-600 hover:text-blue-600 font-medium dark:text-gray-400 dark:hover:text-gray-500" x-cloak>
        <x-tabler-sun-filled x-show="svgMode === 'false'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
        {{-- Dark --}}
        <x-tabler-moon-stars x-show="svgMode === 'true'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
        {{-- System --}}
        <x-tabler-device-desktop x-show="svgMode === 'system'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
    </button>

    <div id="selectThemeDropdown" class="hs-dropdown-menu hs-dropdown-open:opacity-100 mt-2 hidden z-20 transition-[margin,opacity] opacity-0 duration-300 mb-2 origin-bottom-left bg-white shadow-md rounded-lg p-2 space-y-1 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700">
      <button type="button" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"  @click="selectMode('false'); svgMode = 'false';" x-bind:class="svgMode === 'false' ? 'bg-gray-100' : ''">
        <x-tabler-sun-filled class="w-5 h-5 mr-2" />
                Light
      </button>
      <button type="button" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"  @click="selectMode('true'); svgMode = 'true';" x-bind:class="svgMode === 'true' ? 'bg-gray-700 text-indigo-500' : ''">
        <x-tabler-moon-stars class="w-5 h-5 mr-2"/>
                Dark
      </button>
      <button type="button" class=" w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" @click="selectMode('system'); svgMode = 'system';" x-bind:class="svgMode === 'system' ? 'bg-gray-700 dark:text-blue-500' : ''">
        <x-tabler-device-desktop class="w-5 h-5 mr-2"/>
                System
      </button>
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
            localStorage.setItem('darkModeFrontend', value);
            setMode(value);
        }

        setMode(localStorage.getItem('darkModeFrontend') || 'true');
    </script>
  </div>
