<x-back-layout>
    @section('title'){{ __('User Edit') }}@endsection
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => route('users.index'), 'label' => 'Users'],
            ['label' => 'Edit User'],
        ]" />

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-20">
                <div>
                    <x-admin.form-section action="{{ route('users.update', $user->id) }}">
                        <x-slot name="title">
                            {{ __('User') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Update user information') }}
                        </x-slot>

                        <x-slot name="form">
                            @csrf
                            @method('PUT')
                            {{-- Name Role --}}
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="name" value="{{ __('Name') }}" />
                                <x-text-input id="name" type="text" class="mt-1 block w-full" name="name"
                                    :value="old('name', $user->name)" placeholder="name" autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="email" value="{{ __('Email') }}" />
                                <x-text-input id="email" type="email" class="mt-1 block w-full" name="email"
                                    :value="old('email', $user->email)" placeholder="email" autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>
                        </x-slot>
                        <x-slot name="actions">
                            <x-button.primary>
                                <i class="ri-save-3-line mt-0.5"></i>{{ __('Update') }}
                            </x-button.primary>
                        </x-slot>
                    </x-admin.form-section>
                </div>
                <div>
                    <x-admin.form-section action="{{ route('users.update-password', $user->id) }}">
                        <x-slot name="title">
                            {{ __('Update Password') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </x-slot>
                        <x-slot name="form">
                            @csrf
                            <div class="col-span-6 sm:col-span-4">
                                <input type="text" name="id" value="{{ $user->id }}" hidden>
                                <x-input-label for="current_password" value="{{ __('Current Password') }}" />
                                <x-text-input id="current_password" type="password" class="mt-1 block w-full" name="current_password" placeholder="current password" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="password" value="{{ __('New Password') }}" />
                                <x-text-input id="password" type="password" class="mt-1 block w-full" name="password" placeholder="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="password_confirmation" value="{{ __('Password Confirmation') }}" />
                                <x-text-input id="password_confirmation" type="password" class="mt-1 block w-full" name="password_confirmation" placeholder="password confirmation" />
                                <x-input-error :messages="$errors->get('password_confirm')" class="mt-1" />
                            </div>
                        </x-slot>
                        <x-slot name="actions">
                            <x-button.primary>
                                <i class="ri-save-3-line mt-0.5"></i>{{ __('Save') }}
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
