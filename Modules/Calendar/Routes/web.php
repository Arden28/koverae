<?php

use Illuminate\Support\Facades\Route;
use Modules\Calendar\Livewire\Calendar\Calendar;

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

Route::middleware(['module:calendar'])->prefix('calendar')->name('calendar.')->group(function() {
    Route::get('/', Calendar::class)->name('index');
});
