<?php

use Illuminate\Support\Facades\Route;
use Modules\Crm\Http\Controllers\CrmController;
use Modules\Crm\Livewire\Pipeline\Lists;

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

Route::middleware(['module:crm'])->prefix('crm')->name('crm.')->group(function() {
    Route::get('pipelines', Lists::class)->name('pipelines.index');
});
