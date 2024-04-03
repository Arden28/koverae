<?php

use Illuminate\Support\Facades\Route;
use Modules\App\Livewire\Overview;

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

Route::middleware(['module:apps'])->name('apps.')->group(function () {
    // Route::resource('app', AppController::class)->names('app');
    Route::get('/apps', Overview::class)->name('index');
});
