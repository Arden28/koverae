<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoicing\Livewire\Overview;
use Modules\Invoicing\Livewire\PaymentTerm\Create;
use Modules\Invoicing\Livewire\PaymentTerm\Lists;
use Modules\Invoicing\Livewire\PaymentTerm\Show;

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
    // Payment Terms
    Route::prefix('payment-terms')->name('payment-terms.')->group(function(){
        Route::get('/', Lists::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{term}', Show::class)->name('show');
    });
});