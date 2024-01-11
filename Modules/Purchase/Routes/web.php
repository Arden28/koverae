<?php

use Illuminate\Support\Facades\Route;
use Modules\Purchase\Livewire\Invoice\InvoiceShow;
use Modules\Purchase\Livewire\Order\Request\Lists as RequestQuotation;
use Modules\Purchase\Livewire\Order\Request\Create as RequestQuotationCreate;
use Modules\Purchase\Livewire\Order\Request\Show as RequestQuotationShow;
use Modules\Purchase\Livewire\Order\Show as PurchaseShow;
use Modules\Purchase\Livewire\Order\BlanketOrder\Lists as Blanket;
use Modules\Purchase\Livewire\Order\Lists as Quotation;

use Modules\Purchase\Livewire\Vendor\Lists as VendorList;
use Modules\Purchase\Livewire\Vendor\Show as VendorShow;
use Modules\Purchase\Livewire\Vendor\Create as VendorCreate;

use Modules\Purchase\Livewire\Product\Lists as ProductList;
use Modules\Purchase\Livewire\Product\CategoryLists as CategoryList;

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

    // BlanketOrder
    Route::get('purchases/blanket-orders', Blanket::class)->name('purchases.blankets.index');

    // Vendors
    Route::get('purchases/vendors', VendorList::class)->name('purchases.vendors.index');

    // Products
    Route::get('products', ProductList::class)->name('purchases.products.index');
    Route::get('product-categories', CategoryList::class)->name('purchases.products.categories.index');

    // RequestQuotation
    Route::prefix('purchases/requests')->name('purchases.requests.')->group(function(){
        Route::get('/create', RequestQuotationCreate::class)->name('create');
        Route::get('/{request}', RequestQuotationShow::class)->name('show');
    });

    Route::prefix('purchases')->name('purchases.')->group(function(){
        Route::get('/{purchase}/invoices/{invoice}', InvoiceShow::class)->name('invoices.show');
        Route::get('{purchase}', PurchaseShow::class)->name('show');
    });
    // RequestQuotation
    Route::prefix('purchases/vendors')->name('purchases.vendors.')->group(function(){
        Route::get('/create', VendorCreate::class)->name('create');
        Route::get('/{vendor}', VendorShow::class)->name('show');
    });

    // Route::get('purchases/requests/create', RequestQuotationCreate::class)->name('purchases.requests.create');
});
