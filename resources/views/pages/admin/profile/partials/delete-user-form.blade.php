<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-admin.section-title>
        <x-slot name="title">{{ __('Delete Account') }}</x-slot>
        <x-slot name="description">{{ __('Permanently delete your account.') }}</x-slot>
    </x-admin.section-title>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white dark:bg-slate-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
            <p class="text-sm text-gray-600 dark:text-gray-300">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
        </div>
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-[#182235] text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            <x-button.danger
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            ><x-tabler-trash class="w-4 h-4 mr-0.5" />{{ __('Delete Account') }}
            </x-button.danger>
        </div>
    </div>
</div>
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete your account?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-button.secondary x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-button.secondary>

            <x-button.danger class="ms-3">
                {{ __('Delete') }}
            </x-button.danger>
        </div>
    </form>
</x-modal>
