<?php

use Illuminate\Support\Facades\Route;
use Modules\Point\Http\Controllers\PointController;
use Modules\Point\Livewire\Overview;

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

Route::group([], function () {
    // Route::resource('point', PointController::class)->names('point');
    Route::get('point', Overview::class)->name('point.index');
});
