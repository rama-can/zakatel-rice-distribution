<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $desc = 'Zakatel adalah sebuah lembaga nir laba yang mengelola zakat, infak, shodaqoh, dan wakaf dan mendistribusikannya kepada yang berhak sesuai syariat Islam.';
            $getTheme = Cache::remember('settings', now()->addHours(24), function () {
                return Setting::all()->pluck('value', 'key')->toArray();
            });

            $view->with('getTheme', $getTheme, 'desc', $desc);
        });
    }
}