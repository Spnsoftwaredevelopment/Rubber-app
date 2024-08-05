<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RubberController;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'auth.login')->middleware('guest');



require __DIR__ . '/auth_routes.php';


require __DIR__ . '/admin_routes.php';



Auth::routes();

Route::get('/403', function () {
    return view('errors.403'); // Assuming you have a custom 403 error view in resources/views/errors/403.blade.php
})->name('name.of.your.403.route');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});


Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    return 'Application cache has been cleared';
});
