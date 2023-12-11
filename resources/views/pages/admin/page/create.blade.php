<x-back-layout>
    @section('title'){{ __('Create Page') }}@endsection
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/quill.css') }}">
        <!-- Theme included stylesheets -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => route('pages.index'), 'label' => 'Pages'],
            ['label' => 'Create new'],
        ]" />
        <div class="my-8">
            <x-admin.form-section-editor action="{{ route('pages.store') }}" enctype="multipart/form-data">
                <x-slot name="title">
                    {{ __('Page') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new page') }}
                </x-slot>

                <x-slot name="form">
                    @csrf
                    <div class="col-span-6 sm:col-span-8">
                        <div x-data="{ src: '', showInfo: true }" class="mt-2 max-w-sm p-6 mb-4 bg-slate-100 dark:bg-slate-900 border-dashed border-2 border-gray-400 dark:border-gray-500 rounded-lg items-center mx-auto text-center">
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

                                <label for="image">
                                    <input type="file" class="hidden" id="image" name="image" @change="src = URL.createObjectURL($event.target.files[0]); showInfo = false;">
                                    <span class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mt-2">{{ __('Select A New Image') }}</span>
                                </label>
                                <x-input-error :messages="$errors->get('image')" class="mt-1" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-input-label for="title" value="{{ __('Title') }}" />
                        <x-text-input id="title" type="text" class="mt-1 block w-full" name="title"
                            :value="old('title')" placeholder="title" autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-1" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-input-label for="description" value="{{ __('Description') }}" />
                        <x-input-text-area class="mt-1 w-full" id="description" name="description" placeholder="Description" cols="4" rows="3" />
                        <x-input-error :messages="$errors->get('description')" class="mt-1" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="status" value="{{ __('Status') }}" />
                        <select id="status" name="status" class="mt-1 w-full bg-slate-100 border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-1" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-admin.quill-editor
                                label="Content"
                                name="content"
                                value=""
                                placeholder="Content here..." />
                        <x-input-error :messages="$errors->get('content')" class="mt-1" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button.primary>
                        <i class="ri-save-3-line ri-xl"></i>{{ __('Save') }}
                    </x-button.primary>
                </x-slot>
            </x-admin.form-section-editor>

        </div>
    </div>
    @push('scripts')
        <!-- Main Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
    @endpush
</x-back-layout>
