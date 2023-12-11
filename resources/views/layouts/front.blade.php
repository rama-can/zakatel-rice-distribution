<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">
        <title>@yield('title') | {{ $getTheme['site_title'] }}</title>
        <meta name="description" content="@yield('description')">
        <!-- Tag Open Graph untuk Media Sosial -->
        <meta property="og:title" content="@yield('title') | {{ $getTheme['site_title'] }}">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->fullUrl() }}">
        <meta property="og:image" content="@yield('image')">
        <!-- Tag Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title') | {{ $getTheme['site_title'] }}">
        <meta name="twitter:description" content="@yield('description')">
        <meta name="twitter:image" content="@yield('image')">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('storage/'.$getTheme['favicon']) }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/nprogress/nprogress.css') }}">
        <script src="{{ asset('assets/nprogress/nprogress.js') }}"></script>
        @stack('styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/theme.js'])
        <style>
            img {
                color: transparent;
            }
        </style>
    </head>
    <body class="bg-slate-50 dark:bg-slate-900">
        <!-- ========== HEADER ========== -->
        <x-frontend.app.header />
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
            <div
                class="bg-gradient-to-r from-violet-800/70 to-purple-200 blur-3xl w-[2rem] h-[44rem] sm:w-[40rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900">
            </div>
            <div
                class="bg-gradient-to-tl from-blue-100 via-blue-200 to-blue-100 blur-3xl w-[18rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem] dark:from-indigo-900/70 dark:via-indigo-900/70 dark:to-blue-500/70">
            </div>
        </div>
        <!-- End Gradients -->
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            {{ $slot }}
        </main>
        <!-- HTML -->
        <div class="fixed bottom-5 right-3 z-50 font-semibold text-sm">
            <a href="https://wa.me/6281223741538" target="_blank" rel="noopener noreferrer" class="flex items-center bg-green-500 text-white rounded-full px-2 py-2 p-1">
                <x-tabler-brand-whatsapp class="w-6 h-6" />
                <span>&nbsp;Hubungi Kami</span>
            </a>
        </div>
        <!-- ========== END MAIN CONTENT ========== -->
        <x-frontend.app.footer />
        @stack('scripts')
    </body>
</html>
