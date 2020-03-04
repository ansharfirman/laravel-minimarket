<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Auth::routes();

Route::get('verify/{token}', '\App\Http\Controllers\Auth\RegisterController@verify')->name('account.verify');

Route::get('/rebuild', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    if (isset($_SERVER['HTTP_HOST'])) {
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return "<script> window.location.href = '" . $root . "'; </script>";
    }
})->name('app.rebuild');

Route::group(['middleware' => ['SessionTimeout', 'XSS', 'auth']], function ($router) {

    Route::get('/', function () {
        $user = \Auth::user();
        if ($user->can("view_dashboards")) {
            return redirect()->route('dashboards.index');
        } else {
            return redirect()->route('profiles.index');
        }
    })->name("home");

    Route::get('/home', function () {
        return redirect()->route('home');
    });

    Route::resource('dashboards', '\App\Http\Controllers\Main\DashboardController');
    Route::resource('profiles', '\App\Http\Controllers\Main\ProfileController');
});
