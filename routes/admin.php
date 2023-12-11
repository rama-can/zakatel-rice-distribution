<?php

use Illuminate\Support\Facades\Route;
// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

/* Start User */
Route::resource('/users', \Admin\UserController::class);
Route::post('/users/update-password/{user}', 'Admin\UserController@updatePassword')->name('users.update-password');
/* End User */

/* Start Rice */
Route::resource('/rice-distributions', \Admin\RiceDistributionController::class);
Route::resource('/rice-in', \Admin\RiceInController::class)->except(['show']);
Route::get('/rice-out', 'Admin\RiceOutController@index')->name('rice-out.index');
/* End Rice */

/* Start Page */
Route::resource('/pages', \Admin\PageController::class);
/* End Page */

/* Start Setting */
Route::put('/settings/update', 'Admin\SettingController@update')->name('settings.update');
Route::get('/settings/appearance', 'Admin\SettingController@appearance')->name('settings.appearance');
Route::get('/settings/vision-mission', 'Admin\SettingController@visionMission')->name('settings.vision-mission');
Route::get('/settings/legality', 'Admin\SettingController@legality')->name('settings.legality');
Route::get('/settings/history', 'Admin\SettingController@history')->name('settings.history');
Route::get('/settings/clear-cache', 'Admin\SettingController@clearCache')->name('settings.clear-cache');
/* End Setting */

/* Start Gallery */
    Route::get('/profile', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'Admin\ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'Admin\ProfileController@destroy')->name('profile.destroy');
/* End Gallery */