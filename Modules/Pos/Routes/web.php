<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\Pos\Livewire\Display\PaymentPos;
use Modules\Pos\Livewire\Display\Shop;
use Modules\Pos\Livewire\Overview;
use Modules\Pos\Livewire\Pos\Lists;
use Modules\Pos\Livewire\Pos\Create;
use Modules\Pos\Livewire\Pos\Show;

use Modules\Pos\Livewire\PosOrder\Lists as OrderLists;
use Modules\Pos\Livewire\PosOrder\Show as OrderShow;

use Modules\Pos\Livewire\Display\Orders\Lists as OrderPosList;

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

Route::middleware(['module:pos'])->group(function() {
    Route::get('pos-dashboard', Overview::class)->name('pos.index');
    Route::get('pos', Lists::class)->name('pos.lists');
    Route::get('pos/create', Create::class)->name('pos.create');
    Route::get('pos/orders', OrderLists::class)->name('pos.orders');
    Route::get('pos/orders/{order}', OrderShow::class)->name('pos.orders.show');
    Route::get('pos/{pos}', Show::class)->name('pos.show');
    // UI
    Route::get('ui/{pos}/shop/{session}', Shop::class)->name('pos.ui');
    Route::prefix('ui/{pos}/shop/{session}')->name('pos.ui.')->group(function(){
        // Payment
        Route::get('pay/{order}', PaymentPos::class)->name('payment');
        // Orders
        Route::get('orders', OrderPosList::class)->name('orders');
    });
    // View PDF
    Route::get('pos/orders/{order}/pdf/{token}', function ($token) {

        $pdf = PDF::loadView('pos::print')->setPaper('a4');

        return $pdf->stream('sale.pdf');
    })->name('pos.pdf');
});
