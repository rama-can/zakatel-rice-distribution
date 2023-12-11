<x-back-layout>
    @section('title'){{ __('User') }}@endsection
    @push('styles')
    @livewireStyles
    @endpush
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <nav class="text-gray-500 mb-8">
            <ol class="list-none p-0 inline-flex">
                <!-- Start -->
                <ul class="inline-flex flex-wrap text-sm font-medium">
                    <li class="flex items-center">
                        <a class="text-gray-500 hover:text-indigo-500" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        <svg class="h-4 w-4 fill-current text-gray-400 mx-3" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <a class="text-indigo-500" href="#0">{{ __('Users') }}</a>
                    </li>
                </ul>
                <!-- End -->
            </ol>
        </nav>
        <div class="bg-white dark:bg-slate-900 shadow-lg rounded-sm border border-gray-200 dark:border-gray-800">
            <header class="px-5 py-4 flex items-center justify-between border-b dark:border-gray-800">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200">All Users <span class="text-gray-400 font-medium"></span>
                </h2>
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <a href="{{ route('users.create') }}"
                        class="btn bg-indigo-600 hover:bg-indigo-700 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="hidden xs:block ml-2">{{ __('Add User') }}</span>
                    </a>
                </div>
            </header>
            <!-- Table -->
            <div class="mt-2 px-4 my-4">
                <div x-data="{ showModal: false, userId: null, userData: null }"
                    role="dialog"
                    tabindex="-1"
                    x-cloak
                    x-transition
                >
                    <livewire:user-table />
                     <!-- Modal -->
                    <div x-show="showModal" class="relative z-30">
                        <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                        <div class="fixed inset-x-0 top-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white dark:bg-slate-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-slate-100" id="modal-title">Delete account</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500 dark:text-slate-200">Are you sure you want to delete <b x-text="userData"></b> account? All of your data will be permanently removed. This action cannot be undone.</p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="bg-gray-100 dark:bg-slate-700 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <form :action="'{{ route('users.destroy', '') }}' + '/' + userId" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.danger class="ml-3">
                                                    {{ __('Delete Account') }}
                                                </x-button.danger>
                                            </form>
                                            <x-button.secondary @click="showModal = false" class="ml-3">
                                                {{ __('Cancel') }}
                                            </x-button.secondary>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>

    @push('scripts')
    @livewireScripts
    @endpush
</x-back-layout>
