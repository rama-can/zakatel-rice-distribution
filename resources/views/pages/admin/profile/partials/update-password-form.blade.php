<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-admin.section-title>
        <x-slot name="title">{{ __('Update Password') }}</x-slot>
        <x-slot name="description">{{ __('Ensure your account is using a long, random password to stay secure.') }}</x-slot>
    </x-admin.section-title>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('put')
            <div class="px-4 py-5 bg-white dark:bg-slate-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <x-input-label for="current_password" :value="__('Current Password')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-input-label for="password" :value="__('New Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-input-label for="password_confirmation" :value="__('Confirmation Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-[#182235] text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <x-button.primary>{{ __('Save') }}</x-button.pri>
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
