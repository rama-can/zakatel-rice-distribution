<x-front-layout>
@section('title'){{ $data->title }}@endsection
@push('styles')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <style>
    body { margin: 0; padding: 0; }
    </style>
@endpush
    <!-- Blog Article -->
<div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto relative z-[10]">
    <div class="max-w-2xl">
      <!-- Content -->
      <div class="space-y-5 md:space-y-8">
        <div class="space-y-3">
          <h2 class="text-2xl font-bold md:text-3xl text-gray-900 dark:text-white">{{ $data->title }}</h2>
          <div class="grid gap-4 grid-cols-2  px-2 py-2 border-2 rounded-lg border-slate-100 dark:border-slate-900">
            <div class="col-span-2 md:col-span-1 text-sm font-semibold text-gray-800 dark:text-gray-200">
                Status:
                @if ($data->status === 'pending')
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-1.5 rounded-lg text-xs bg-yellow-100 text-yellow-800 dark:bg-yellow-600/30 dark:text-yellow-500">Pending</span>
                @elseif ($data->status === 'dalam pengiriman')
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-1.5 rounded-lg text-xs bg-blue-100 text-blue-800 dark:bg-blue-600/30 dark:text-blue-500">Dalam Pengiriman</span>
                @elseif ($data->status === 'selesai')
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-1.5 rounded-lg text-xs bg-teal-100 text-teal-800 dark:bg-green-600/30 dark:text-green-500">Selesai</span>
                @endif
            </div>
            <div class="col-span-2 md:col-span-1 text-sm font-semibold text-gray-800 dark:text-gray-200 inline-flex">
                <x-tabler-calculator class="flex-shrink-0 w-5 h-5 mt-0.5 mr-0.5" />Jumlah: {{ $data->quantity_distributed }} Kg
            </div>
            <div class="text-sm font-semibold text-gray-800 dark:text-gray-200 inline-flex">
                <x-tabler-calendar-event class="flex-shrink-0 w-5 h-5 mt-0.5 mr-0.5" /> {{ $date }}
            </div>
            <div class="col-span-2 md:col-span-1">
                <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-1.5 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#maps-modal">
                <x-tabler-map-pin-share class="flex-shrink-0 w-4 h-4" />
                    Alamat
                </button>
            </div>
          </div>
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
            <div x-show="contentLoaded" class="text-base text-gray-800 dark:text-gray-200">
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
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="https://twitter.com/share?url={{ route('distribution.detail', $data->slug) }}&text={{ $data->title }}&via={{ $getTheme['site_title'] }}" target="_blank">
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>
              Share on Twitter
            </a>
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gray-400" href="https://www.facebook.com/sharer/sharer.php?u={{ route('distribution.detail', $data->slug) }}" target="_blank">
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg>
              Share on Facebook
            </a>
          </div>
        </div>
        <!-- Button -->
      </div>
    </div>
  </div>
  <!-- End Sticky Share Group -->
  <div id="maps-modal" class="hs-overlay hidden w-full h-full fixed top-20 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="bg-slate-50 dark:bg-slate-800 rounded shadow-lg overflow-auto max-w-lg w-full max-h-full pointer-events-auto">
            <div class="px-5 py-3 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-gray-800 dark:text-gray-200">Alamat</div>
                    <button class="text-gray-400 hover:text-gray-500" data-hs-overlay="#maps-modal">
                        <div class="sr-only">Close</div>
                        <svg class="w-4 h-4 fill-current">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-5">
                <!-- Modal header -->
                {{-- <div class="mb-2">
                    <div class="mb-3">
                        <div class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600 rounded-full text-center px-2.5 py-1">New on Mosaic</div>
                    </div>
                </div> --}}
                <!-- Modal content -->
                <div class="mb-5 flex flex-col items-center">
                    <div class="relative">
                      <div id="map" style="height: 200px; width: 300px;" class="border border-indigo-500 rounded-lg"></div>
                    </div>
                    <p class="text-sm text-gray-800 dark:text-gray-100 ml-5 mb-2 mt-1">{{ $data->destination }}</p>
                </div>
                <!-- Modal footer -->
                <div class="flex flex-wrap justify-end space-x-2">
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white" data-hs-overlay="#maps-modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  </div>
@push('scripts')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiY29kZW5pYWdhIiwiYSI6ImNsb2lqZm4xZjFrNXoycnBsbzgyMXlteWsifQ.3hxB1A0jgdbATU49PvgwkQ';
    const map = new mapboxgl.Map({
    container: 'map',
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [{{ $data->final_address }}], // Default location (Bandung)
    zoom: 14
    });

    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
    .setLngLat([{{ $data->final_address }}])
    .addTo(map);
</script>
@endpush
</x-front-layout>
