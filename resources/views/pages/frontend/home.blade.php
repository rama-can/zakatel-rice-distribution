<x-front-layout>@section('title'){{ __('Home') }}@endsection
    <!-- Hero -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="max-w-2xl text-center mx-auto">
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl dark:text-white">
                    <span class="bg-clip-text bg-gradient-to-tl from-indigo-500 to-blue-500 text-transparent">{{ $getTheme['site_title'] }}</span>
                </h1>
                <p class="mt-2 text-lg text-gray-800 dark:text-gray-100"><u>"Mendistribusikan kepada yang berhak"</u></p>
            </div>

            <div class="mt-10 relative max-w-5xl mx-auto sm:block">
                <img src="https://zakatel-demo.dlalajo.com/storage/images/general/home-banner.webp" alt="Banner" class="w-full object-cover h-40 sm:h-[60vh] rounded-xl">
                <div class="absolute bottom-0 -start-20 -z-[1] w-48 h-48 bg-gradient-to-b from-orange-500 to-white p-px rounded-lg dark:to-slate-900">
                    <div class="bg-slate-50 w-48 h-48 rounded-lg dark:bg-slate-900"></div>
                </div>

                <div class="absolute -top-12 -end-20 -z-[1] w-48 h-48 bg-gradient-to-t from-blue-600 to-cyan-400 p-px rounded-full">
                    <div class="bg-slate-50 w-48 h-48 rounded-full dark:bg-slate-900"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->
    <!-- Hero -->
    <div class="max-w-[75rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-[10] mt-20 bg-slate-100 dark:bg-slate-900 border rounded-xl border-gray-200 dark:border-gray-700">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center mt-1">
            <div>
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white bg-clip-text"><span class="text-blue-600">Zakatel</span></h1>
                <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">Zakatel adalah sebuah lembaga nir laba yang mengelola zakat, infak, shodaqoh, dan wakaf dan mendistribusikannya kepada yang berhak sesuai syariat Islam.</p>

                <!-- Buttons -->
                <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                <a class="py-3 px-4 mb-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="https://donasi.zakatel.id" target="_blank">
                    Donasi Sekarang
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </a>
                </div>
                <!-- End Buttons -->
            </div>
            <!-- End Col -->

            <div class="relative ms-4 hidden sm:block mb-2 mt-2">
                <img class="w-1/2 rounded-md float-right" src="https://donasi.zakatel.id/img/logo.png" alt="Image Description">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Hero -->
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
                    <p class="mt-1 text-gray-600 dark:text-gray-400">Distribusi zakat beras kepada penerima yang telah diverifikasi. Ini mungkin mencakup jadwal distribusi, lokasi distribusi, dan jumlah zakat yang diterima oleh setiap penerima.</p>
                </div>
                <!-- End Title -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($distributions as $data)
                    <a class="relative rounded-xl before:absolute before:inset-0 before:z-10 before:border before:border-gray-200 before:rounded-xl before:transition before:hover:border-2 before:hover:border-blue-600 before:hover:shadow-lg dark:bg-[#151c2f] dark:before:border-gray-700 dark:before:hover:border-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="{{ route('distribution.detail', $data->slug) }}">
                        <div class="relative pt-[50%]">
                            <img class="w-full h-full absolute top-0 start-0 object-cover rounded-t-xl dark:hidden" src="{{ Storage::url($data->image) }}" alt="Image Description">
                            <img class="hidden w-full h-full absolute top-0 start-0 object-cover rounded-t-xl dark:block" src="{{ Storage::url($data->image) }}" alt="Image Description">
                        </div>
                        <div class="bg-white py-3.5 px-4 rounded-b-xl dark:bg-slate-900">
                            <h3 class="mt-1 mb-1 text-xl text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                {{ $data->title }}
                            </h3>
                            @if ($data->status === 'pending')
                                <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-600/30 dark:text-yellow-500">Pending</span>
                            @elseif ($data->status === 'dalam pengiriman')
                                <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-600/30 dark:text-blue-500">Dalam Pengiriman</span>
                            @elseif ($data->status === 'selesai')
                                <span class="inline-flex items-center gap-x-1.5 py-1 px-1 rounded-lg text-xs font-medium bg-teal-100 text-teal-800 dark:bg-green-600/30 dark:text-green-500">Selesai</span>
                            @endif
                            <br>
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
        </div>
        <div class="h-1 w-4/5 mx-auto mt-10">
            <div class="h-1/2 w-full bg-gradient-to-r from-transparent to-transparent dark:via-violet-400"></div>
        </div>
    </div>
    <!-- End Card Blog -->
    <!-- FAQ -->
    <div class="max-w-[80rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto g-slate-100 dark:bg-slate-900 border rounded-xl border-gray-200 dark:border-gray-700">
        <!-- Grid -->
        <div class="grid md:grid-cols-5 gap-10">
        <div class="md:col-span-2">
            <div class="max-w-xs">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Pertanyaan</h2>
            <p class="mt-1 hidden md:block text-gray-600 dark:text-gray-400">
                Jawaban atas pertanyaan yang paling sering diajukan.
                </p>
            </div>
        </div>
        <!-- End Col -->

        <div class="md:col-span-3">
            <!-- Accordion -->
            <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-gray-700">
            <div class="hs-accordion pb-3 active" id="hs-basic-with-title-and-arrow-stretched-heading-one">
                <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-one">
                Visi
                <svg class="hs-accordion-active:hidden block flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                <svg class="hs-accordion-active:block hidden flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                </button>
                <div id="hs-basic-with-title-and-arrow-stretched-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-one">
                    <article class="prose text-base text-gray-600 dark:text-gray-400">
                        {!! $getTheme['zakatel_visi'] !!}
                    </article>
                </div>
            </div>

            <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-two">
                <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-two">
                    MISI
                <svg class="hs-accordion-active:hidden block flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                <svg class="hs-accordion-active:block hidden flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                </button>
                <div id="hs-basic-with-title-and-arrow-stretched-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-two">
                    <article class="prose text-base text-gray-600 dark:text-gray-400">
                        {!! $getTheme['zakatel_misi'] !!}
                    </article>
                </div>
            </div>

            <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-three">
                <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-three">
                    LEGALITAS
                <svg class="hs-accordion-active:hidden block flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                <svg class="hs-accordion-active:block hidden flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                </button>
                <div id="hs-basic-with-title-and-arrow-stretched-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-three">
                    <article class="prose text-base text-gray-600 dark:text-gray-400">
                        {!! $getTheme['zakatel_legalitas'] !!}
                    </article>
                </div>
            </div>
            </div>
            <!-- End Accordion -->
        </div>
        <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End FAQ -->
</x-front-layout>
