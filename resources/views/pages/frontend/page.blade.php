<x-front-layout>
    @section('title', $data->title)
    @section('description', $data->description)
    @section('image', url('storage/'.$data->image ))
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
</x-front-layout>
