<?php

use Illuminate\Support\Facades\Route;
use Modules\Barcode\Livewire\Barcode\Scanner;

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


Route::middleware(['module:barcode'])->prefix('barcode')->name('barcode.')->group(function() {
    Route::get('/', Scanner::class)->name('index');
});
