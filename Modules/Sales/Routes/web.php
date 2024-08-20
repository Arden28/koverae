<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
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
use Modules\Sales\Livewire\Team\Show as TeamShow;
use Modules\Sales\Livewire\Team\Lists as TeamLists;
use Modules\Sales\Livewire\Sale\Invoice\Show as InvoiceShow;

use Modules\Sales\Livewire\SalesProgram\Lists as ProgramLists;
use Modules\Sales\Livewire\SalesProgram\Create as ProgramCreate;
use Modules\Sales\Livewire\SalesProgram\Show as ProgramShow;

use Modules\Sales\Livewire\PriceList\Lists as PriceLists;
use Modules\Sales\Livewire\PriceList\Create as PriceCreate;
use Modules\Sales\Livewire\PriceList\Show as PriceShow;

use Modules\Sales\Livewire\Analysis\SalesAnalysis;

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
    Route::get('quotations', QuotationLists::class)->name('sales.quotations.index');
    Route::get('sales/teams', TeamLists::class)->name('sales.teams.index');
    Route::get('sales-programs', ProgramLists::class)->name('sales.programs.index');
    Route::get('price-lists', PriceLists::class)->name('sales.pricelists.index');
    // Customers
    Route::get('sales/customers', CustomerLists::class)->name('sales.customers.index');

    // Quotations
    Route::prefix('quotations')->name('sales.quotations.')->group(function(){
        Route::get('/create', QuotationCreate::class)->name('create');
        Route::get('/{quotation}', QuotationShow::class)->name('show');
    });
    // Sales
    Route::prefix('sales')->name('sales.')->group(function(){
        // Invoices
        Route::get('/{sale}/invoices/{invoice}', InvoiceShow::class)->name('invoices.show');
        // Sales
        Route::get('/create', SaleCreate::class)->name('create');
        Route::get('/{sale}', SaleShow::class)->name('show');
        // Sales Team
        Route::prefix('sales-teams')->name('teams.')->group(function(){
            Route::get('/create', TeamCreate::class)->name('create');
            Route::get('/{team}', TeamShow::class)->name('show');
        });

        // Route::resource('teams', SalesTeamController::class);
    });
    // Price Lists
    Route::prefix('price-lists')->name('sales.pricelists.')->group(function(){
        Route::get('/create', PriceCreate::class)->name('create');
        Route::get('/{pricelist}', PriceShow::class)->name('show');
    });
    // Sales Program
    Route::prefix('sales-programs')->name('sales.programs.')->group(function(){
        Route::get('/create', ProgramCreate::class)->name('create');
        Route::get('/{team}', ProgramShow::class)->name('show');
    });

    // Analysis
    Route::get('sales/analysis/', SalesAnalysis::class)->name('sales.analysis');


    // Route::get('/', 'SalesController@index');
    // Route::get('quotations/create', [QuotationController::class, 'create'])->name('quotations.create');
    // Route::get('quotations/{id}/show', [QuotationController::class, 'show'])->name('quotations.show');
});