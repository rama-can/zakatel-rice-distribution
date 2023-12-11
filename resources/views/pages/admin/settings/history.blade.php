<x-back-layout>
    @section('title'){{ __('History') }}@endsection
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/quill.css') }}">
        <!-- Theme included stylesheets -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => '#', 'label' => 'Settings'],
            ['label' => 'History'],
        ]" />

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-20">
                <div>
                    <x-admin.form-section action="{{ route('settings.update') }}" enctype="multipart/form-data">
                        <x-slot name="title">
                            {{ __('History') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Update History information') }}
                        </x-slot>

                        <x-slot name="form">
                            @csrf
                            @method('PUT')
                            <div class="col-span-6 sm:col-span-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <x-admin.quill-editor
                                        label="Visi"
                                        name="zakatel_sejarah"
                                        value="{!! $setting['zakatel_sejarah'] !!}"
                                        placeholder="history here..." />
                                </div>
                                <x-input-error :messages="$errors->get('zakatel_visi')" class="mt-1" />
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
    @push('scripts')
        <!-- Main Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
    @endpush
</x-back-layout>
