<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoicing\Livewire\Overview;

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

Route::middleware(['module:invoicing'])->name('invoices.')->group(function () {
    Route::get('/invoicing', Overview::class)->name('index');
});