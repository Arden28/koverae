<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboards\Http\Controllers\DashboardsController;
use Modules\Dashboards\Livewire\Dashboard\Lists;
use Modules\Dashboards\Livewire\Overview;

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

Route::prefix('dashboards')->middleware(['module:dashboards'])->name('dashboards.')->group(function() {
    Route::get('/', Overview::class)->name('index');
    Route::get('/lists', Lists::class)->name('lists');
});
