<?php

use Illuminate\Support\Facades\Route;
use Modules\Purchase\Livewire\Order\Request\Lists as RequestQuotation;
use Modules\Purchase\Livewire\Order\Request\Create as RequestQuotationCreate;
use Modules\Purchase\Livewire\Order\Request\Show as RequestQuotationShow;
use Modules\Purchase\Livewire\Order\Show as PurchaseShow;
use Modules\Purchase\Livewire\Order\BlanketOrder\Lists as Blanket;
use Modules\Purchase\Livewire\Order\Lists as Quotation;
use Modules\Purchase\Livewire\Vendor\Lists as Vendor;

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

Route::middleware(['module:purchase'])->group(function() {

    // Quotation
    Route::get('purchases', Quotation::class)->name('purchases.index');
    Route::get('purchases/requests', RequestQuotation::class)->name('purchases.requests.index');

    Route::get('purchases/{purchase}', PurchaseShow::class)->name('purchases.show');

    // RequestQuotation
    Route::prefix('purchases/requests')->name('purchases.requests.')->group(function(){
        Route::get('/create', RequestQuotationCreate::class)->name('create');
        Route::get('/{request}', RequestQuotationShow::class)->name('show');
    });
    // Route::get('purchases/requests/create', RequestQuotationCreate::class)->name('purchases.requests.create');

    // BlanketOrder
    Route::get('purchases/blanket-orders', Blanket::class)->name('purchases.blankets.index');
    // Vebdors
    Route::get('purchases/vendors', Vendor::class)->name('purchases.vendors.index');
});
