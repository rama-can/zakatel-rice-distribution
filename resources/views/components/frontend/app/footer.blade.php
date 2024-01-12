<footer class="w-full max-w-[200rem] py-0 px-10 sm:px-20 lg:px-0 mx-auto">
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700 bg-slate-100 dark:bg-slate-900">
      <div class="sm:flex sm:justify-between sm:items-center">
        <div class="flex items-center gap-x-3 mb-5">
          <div class="space-x-4 text-sm ms-4">
            <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('home') }}">Home</a>
            <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('distribution') }}">Distribusi Beras</a>
            <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('rice.report', 'laporan-beras') }}">Laporan Beras</a>
            <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('page.detail', 'tentang-kami') }}">Tentang Kami</a>
          </div>
        </div>

        <div class="flex justify-center items-center">
          <div class="mt-3 sm:hidden">
            <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-gray-400">© {{ Date('Y') }} Zakatel.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
