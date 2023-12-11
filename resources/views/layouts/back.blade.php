<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">
        <!-- Title -->
        <title>@yield('title') | {{ $getTheme['site_title'] }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ Storage::url($getTheme['favicon']) }}">
        <link rel="stylesheet" href="{{ asset('assets/nprogress/nprogress.css') }}">
        <script src="{{ asset('assets/nprogress/nprogress.js') }}"></script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
        <!-- Styles -->
        @stack('styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400"
        :class="{ 'sidebar-expanded': sidebarExpanded }"
        x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
        x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
    >

        <script>
            if (localStorage.getItem('sidebar-expanded') == 'true') {
                document.querySelector('body').classList.add('sidebar-expanded');
            } else {
                document.querySelector('body').classList.remove('sidebar-expanded');
            }
        </script>

        <!-- Page wrapper -->
        <div class="flex h-screen overflow-hidden">

            <x-admin.app.sidebar />

            <!-- Content area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif" x-ref="contentarea">

                <x-admin.app.header />

                <main>
                    {{ $slot }}
                </main>

            </div>

        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    notify()->error($error);
                @endphp
            @endforeach
        @endif
        <x:notify.notify-messages />
        {{-- @livewireScripts --}}
        @stack('scripts')
    </body>
</html>
