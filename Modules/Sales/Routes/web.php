<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\Http\Controllers\QuotationController;
use Modules\Sales\Http\Controllers\SalesController;
use Modules\Sales\Http\Controllers\SalesTeamController;
use Modules\Sales\Livewire\Customer\Lists as CustomerLists;
// Quotation
use Modules\Sales\Livewire\Quotation\Lists as QuotationLists;
use Modules\Sales\Livewire\Quotation\Create as QuotationCreate;
use Modules\Sales\Livewire\Quotation\Show as QuotationShow;
// Sale
use Modules\Sales\Livewire\Sale\Lists as SaleLists;
use Modules\Sales\Livewire\Sale\Create as SaleCreate;
use Modules\Sales\Livewire\Sale\Invoice\Edit;
use Modules\Sales\Livewire\Sale\Show as SaleShow;
use Modules\Sales\Livewire\Team\Create as TeamCreate;
use Modules\Sales\Livewire\Team\Lists as TeamLists;
use Modules\Sales\Livewire\Sale\Invoice\Show as InvoiceShow;

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


Route::middleware(['module:sales'])->group(function() {

    // Sales
    Route::get('sales', SaleLists::class)->name('sales.index');
        // Route::get('sales/{sale}', ['uses' => SaleShow::class, 'as' => 'sales.show']);

    Route::get('quotations', QuotationLists::class)->name('sales.quotations.index');

    Route::get('sales/teams', TeamLists::class)->name('sales.teams.index');

    // Customers
    Route::get('sales/customers', CustomerLists::class)->name('sales.customers.index');

    Route::prefix('sales')->name('sales.')->group(function(){

        // Invoices
        Route::get('/{sale}/invoices/{invoice}', InvoiceShow::class)->name('invoices.show');

        // Sales
        Route::get('/create', SaleCreate::class)->name('create');
        Route::get('/{sale}', SaleShow::class)->name('show');

        // Quotations
        // Route::get('/quotations', ['uses' => QuotationLists::class, 'as' => 'quotations.index']);

        Route::prefix('quotations')->name('quotations.')->group(function(){
            Route::get('/create', QuotationCreate::class)->name('create');
            Route::get('/{quotation}', QuotationShow::class)->name('show');
        });

        // Sales Team
        Route::prefix('teams')->name('teams.')->group(function(){
            Route::get('/create', TeamCreate::class)->name('create');
            Route::get('/{team}', QuotationShow::class)->name('show');
        });

        // Route::resource('teams', SalesTeamController::class);
    });

    // Route::get('/', 'SalesController@index');
    // Route::get('quotations/create', [QuotationController::class, 'create'])->name('quotations.create');
    // Route::get('quotations/{id}/show', [QuotationController::class, 'show'])->name('quotations.show');
});
