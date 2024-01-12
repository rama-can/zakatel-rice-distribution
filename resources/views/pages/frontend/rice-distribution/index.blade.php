<x-front-layout>
    @section('title', 'Distribusi Beras')
    @section('description', \App\Helpers\SettingHelper::descSite())
    @section('image', url('storage/'.$getTheme['logo'] ))
        <!-- End Card Blog -->
        <div class="relative mb-8 lg:mb-16">
            <!-- Gradients -->
            {{-- <div aria-hidden="true" class="flex absolute start-0 -z-[1]">
                <div class="bg-gradient-to-r from-violet-800/70 to-purple-200 blur-3xl w-[30rem] h-[55rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900"></div>

            </div> --}}
            <!-- End Gradients -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-20 lg:py-14 mx-auto">
                <!-- Grid -->
                <div class="relative">
                    <!-- Title -->
                    <div class="max-w-2xl mb-10">
                        <h2 class="py-3 flex items-center text-2xl font-bold md:text-4xl md:leading-tight text-gray-800 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:after:border-gray-600">Aksi terbaru kami</h2>
                        {{-- <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Berita</h2> --}}
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Distribusi zakat beras kepada penerima yang telah diverifikasi. Ini mungkin mencakup jadwal distribusi, lokasi distribusi, dan jumlah zakat yang diterima oleh setiap penerima.</p>
                    </div>
                    <!-- End Title -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($distributions as $data)
                        <a class="relative rounded-xl before:absolute before:inset-0 before:z-10 before:border before:border-gray-200 before:rounded-xl before:transition before:hover:border-2 before:hover:border-blue-600 before:hover:shadow-lg dark:bg-slate-900 dark:before:border-gray-700 dark:before:hover:border-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="{{ route('distribution.detail', $data->slug) }}">
                            <div class="relative pt-[50%]">
                                <div class="flex animate-pulse">
                                    <div class="flex-shrink-0">
                                      <span class="w-full h-full absolute top-0 start-0 object-cover bg-gray-200 rounded-t-xl dark:bg-gray-700"></span>
                                    </div>
                                </div>
                                <img class="w-full h-full absolute top-0 start-0 object-cover rounded-t-xl dark:hidden" src="{{ Storage::url($data->image) }}" alt="Image Description">
                                <img class="hidden w-full h-full absolute top-0 start-0 object-cover rounded-t-xl dark:block" src="{{ Storage::url($data->image) }}" alt="Image Description">
                            </div>
                            <div class="bg-white py-3.5 px-4 rounded-b-xl dark:bg-slate-900">
                                @if ($data->status === 'pending')
                                    <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500">Pending</span>
                                @elseif ($data->status === 'dalam pengiriman')
                                    <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">Dalam Pengiriman</span>
                                @elseif ($data->status === 'selesai')
                                    <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Selesai</span>
                                @endif
                                <h3 class="mt-1 text-xl text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                    {{ $data->title }}
                                </h3>
                                <p
                                    class="mt-1 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    Lihat Selengkapnya
                                    <x-tabler-chevron-right class="flex-shrink-0 w-4 h-4 transition ease-in-out group-hover:translate-x-1 mb-0" />
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $distributions->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
</x-front-layout>
