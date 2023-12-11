<x-front-layout>
    @section('title'){{ $data->title }}@endsection
        <!-- Blog Article -->
    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto relative z-[10]">
        <div class="max-w-2xl">
          <!-- Content -->
          <div class="space-y-5 md:space-y-8">
            <div class="space-y-3">
              <h2 class="text-2xl font-bold md:text-3xl text-gray-900 dark:text-white">{{ $data->title }}</h2>
              <div x-data="{ dataLoaded: false }" x-init="setTimeout(() => { dataLoaded = true }, 1500)">
                <div x-show="!dataLoaded" class="flex animate-pulse">
                  <div class="w-full">
                    <ul class="space-y-3">
                      <li class="w-full h-96 bg-gray-200 rounded-xl dark:bg-slate-700"></li>
                    </ul>
                  </div>
                </div>
                <figure x-show="dataLoaded">
                  <img
                    x-bind:src="'{{ url('storage/' . $data->image) }}'"
                    class="w-full h-96 object-cover rounded-xl"
                    alt="Image Description"
                    style="color: transparent;"
                  >
                </figure>
              </div>
              <div x-data="{ contentLoaded: false }" x-init="setTimeout(() => { contentLoaded = true }, 1500)">
                <div x-show="!contentLoaded" class="animate-pulse">
                    <div class="mt-2 w-full">
                        <h3 class="h-4 bg-gray-200 rounded-full dark:bg-gray-700" style="width: 40%;"></h3>
                        <ul class="mt-5 space-y-3">
                          <li class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700"></li>
                          <li class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700"></li>
                          <li class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700"></li>
                          <li class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700"></li>
                        </ul>
                    </div>
                  <!-- Add more divs to mimic the structure of your actual content -->
                </div>
                <div x-show="contentLoaded">
                    {{-- {!! \App\Helpers\SettingHelper::convert($data->content) !!} --}}
                    <article class="prose text-base text-gray-800 dark:text-gray-200">
                        {!! $data->content !!}
                    </article>
                </div>
              </div>

            </div>
          </div>
          <!-- End Content -->
        </div>
      </div>
      <!-- End Blog Article -->

      <!-- Sticky Share Group -->
      <div class="sticky bottom-6 inset-x-0 text-center z-10">
        <div class="inline-block bg-white shadow-md rounded-full py-3 px-4 dark:bg-gray-800">
          <div class="flex items-center gap-x-1.5">
            <!-- Button -->
            <div class="hs-dropdown relative inline-flex">
              <button type="button" id="blog-article-share-dropdown" class="hs-dropdown-toggle flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
                Share
              </button>
              <div class="hs-dropdown-menu w-56 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mb-1 z-10 bg-gray-900 shadow-md rounded-xl p-2 dark:bg-black" aria-labelledby="blog-article-share-dropdown">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="#">
                  <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                  Copy link
                </a>
                <div class="border-t border-gray-600 my-2"></div>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="#">
                  <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                  </svg>
                  Share on Twitter
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="#">
                  <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                  </svg>
                  Share on Facebook
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="#">
                  <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                  </svg>
                  Share on LinkedIn
                </a>
              </div>
            </div>
            <!-- Button -->
          </div>
        </div>
      </div>
</x-front-layout>
