<x-back-layout>@section('title'){{ __('User Create') }}@endsection
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => route('users.index'), 'label' => 'Users'],
            ['label' => 'Create new user'],
        ]" />

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-20">
                <div>
                    <x-admin.form-section action="{{ route('users.store') }}">
                        <x-slot name="title">
                            {{ __('User') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Create new user') }}
                        </x-slot>

                        <x-slot name="form">
                            @csrf
                            @method('POST')
                            {{-- Name Role --}}
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="name" value="{{ __('Name') }}" />
                                <x-text-input id="name" type="text" class="mt-1 block w-full" name="name"
                                    :value="old('name')" placeholder="name" autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="email" value="{{ __('Email') }}" />
                                <x-text-input id="email" type="email" class="mt-1 block w-full" name="email"
                                    :value="old('email')" placeholder="email" autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="password" value="{{ __('Password') }}" />
                                <x-text-input id="password" type="password" class="mt-1 block w-full" name="password"
                                    :value="old('password')" placeholder="password" autocomplete="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-text-input id="password_confirmation" type="password" class="mt-1 block w-full" name="password_confirmation"
                                    :value="old('password')" placeholder="confirm password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
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
