<x-back-layout>
    @section('title'){{ __('Appearance') }}@endsection
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => '#', 'label' => 'Settings'],
            ['label' => 'Appearance'],
        ]" />

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-20">
                <div>
                    <x-admin.form-section action="{{ route('settings.update') }}" enctype="multipart/form-data">
                        <x-slot name="title">
                            {{ __('Appearance') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Site Appearance Information') }}
                        </x-slot>

                        <x-slot name="form">
                            @csrf
                            @method('PUT')
                            <div class="col-span-6 sm:col-span-6">
                                <x-input-label for="site_title" value="{{ __('Site Title') }}" />
                                <x-text-input id="site_title" type="text" class="mt-1 block w-full" name="site_title"
                                    :value="old('site_title', $setting['site_title'])" placeholder="site_title" autocomplete="site_title" />
                                <x-input-error :messages="$errors->get('site_title')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-6 text-center">
                                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-700 dark:text-gray-400">Logo</h5>
                                <div x-data="{ src: '{{ Storage::url($setting['logo']) }}', showInfo: false }" class="mt-2 max-w-sm p-6 mb-4 bg-slate-100 dark:bg-slate-900 border-dashed border-2 border-gray-400 dark:border-gray-500 rounded-lg items-center mx-auto text-center">
                                        <div>
                                            <figure>
                                                <img class="max-h-48 rounded-lg mx-auto border-2 border-gray-300" :src="src" alt="" />
                                            </figure>
                                            <div x-show="showInfo">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 dark:text-gray-400 mx-auto mb-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                </svg>
                                                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-700 dark:text-gray-400">Upload picture</h5>
                                                <p class="text-xs font-semibold leading-5 text-gray-600 dark:text-gray-400 mt-1">724x340px | PNG, JPG, AVIF, WEBP up to 2MB</p>
                                            </div>

                                            <label for="logo">
                                                <input type="file" class="hidden" id="logo" name="logo" value="{{ $setting['logo'] }}" @change="src = URL.createObjectURL($event.target.files[0]); showInfo = false;">
                                                <span class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mt-2">{{ __('Select A New Image') }}</span>
                                            </label>
                                        </div>
                                        <x-input-error :messages="$errors->get('image')" class="mt-1" class="mt-1" />
                                    </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6 text-center">
                                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-700 dark:text-gray-400">Favicon</h5>
                                <div x-data="{ src: '{{ Storage::url($setting['favicon']) }}', showInfo: false }" class="mt-2 max-w-sm p-6 mb-4 bg-slate-100 dark:bg-slate-900 border-dashed border-2 border-gray-400 dark:border-gray-500 rounded-lg items-center mx-auto text-center">
                                        <div>
                                            <figure>
                                                <img class="max-h-48 rounded-lg mx-auto border-2 border-gray-300" :src="src" alt="" />
                                            </figure>
                                            <div x-show="showInfo">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 dark:text-gray-400 mx-auto mb-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                </svg>
                                                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-700 dark:text-gray-400">Upload picture</h5>
                                                <p class="text-xs font-semibold leading-5 text-gray-600 dark:text-gray-400 mt-1">724x340px | PNG, JPG, AVIF, WEBP up to 2MB</p>
                                            </div>

                                            <label for="favicon">
                                                <input type="file" class="hidden" id="favicon" name="favicon" value="{{ $setting['favicon'] }}" @change="src = URL.createObjectURL($event.target.files[0]); showInfo = false;">
                                                <span class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mt-2">{{ __('Select A New Image') }}</span>
                                            </label>
                                        </div>
                                        <x-input-error :messages="$errors->get('image')" class="mt-1" class="mt-1" />
                                    </div>
                            </div>
                        </x-slot>
                        <x-slot name="actions">
                            <x-button.primary>
                                <i class="ri-save-3-line mt-0.5"></i>{{ __('Update') }}
                            </x-button.primary>
                        </x-slot>
                    </x-admin.form-section>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                notify()->error($error);
            @endphp
        @endforeach
    @endif
</x-back-layout>
