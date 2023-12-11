<x-back-layout>@section('title'){{ __('Profile') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
            @include('pages.admin.profile.partials.update-profile-information-form')
        </div>
        <x-admin.section-border />
        <div class="mt-10 sm:mt-0">
            @include('pages.admin.profile.partials.update-password-form')
        </div>
        <x-admin.section-border />
        <div class="mt-10 sm:mt-0">
            @include('pages.admin.profile.partials.delete-user-form')
        </div>
    </div>
</x-back-layout>
