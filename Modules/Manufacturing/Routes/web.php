<?php

use Illuminate\Support\Facades\Route;
use Modules\Manufacturing\Http\Controllers\ManufacturingController;
use Modules\Manufacturing\Livewire\Order\Lists as OrderList;
use Modules\Manufacturing\Livewire\Order\Create as OrderCreate;
use Modules\Manufacturing\Livewire\Order\Show as OrderShow;

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

Route::middleware(['module:manufacturing'])->group(function () {
    Route::get('manufacturing-order', OrderList::class)->name('manufacturing.orders.index');
    Route::name('manufacturing.')->group(function () {
        // Manufacturing Order
        Route::get('manufacturing-order/create', OrderCreate::class)->name('orders.create');
        Route::get('manufacturing-order/{order}', OrderShow::class)->name('orders.show');
        // Bill Of Materials
    });

    // Route::resource('manufacturing', ManufacturingController::class)->names('manufacturing.index');
});
